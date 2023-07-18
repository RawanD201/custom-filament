<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Livewire\Redirector;
use Filament\Facades\Filament;
use Illuminate\Contracts\View\View;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Phpsa\FilamentPasswordReveal\Password;
use Illuminate\Validation\ValidationException;
use Filament\Forms\Concerns\InteractsWithForms;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

/**
 * @property ComponentContainer $form
 */
class Login extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRateLimiting;

    public $username = '';

    public $password = '';

    public $remember = false;

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $this->form->fill();
    }

    public function authenticate(): LoginResponse|Redirector|null
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'username' => __('filament::login.messages.throttled', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]),
            ]);
        }

        $data = $this->form->getState();

        if ($user = \App\Models\User::where('username', $data['username'])->first()) {
            $isIncompleteAccount = $user->password === null;

            if ($isIncompleteAccount) {
                return $this->showCompleteAccountPage();
            }


            if (!$user->is_active) {
                throw ValidationException::withMessages([
                    'error' => __('auth.account_deactivated'),
                ]);
            }
        }

        if (!Filament::auth()->attempt([
            'username' => $data['username'],
            'password' => $data['password'],
        ], $data['remember'])) {
            throw ValidationException::withMessages([
                'username' => __('filament::login.messages.failed'),
            ]);
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('username')
                ->label(__('attr.username'))
                ->required()
                ->autocomplete(),
            Password::make('password')
                ->label(__('filament::login.fields.password.label'))
                ->showIcon('heroicon-o-eye-off')
                ->hideIcon('heroicon-o-eye')
                ->required(),
            Checkbox::make('remember')
                ->label(__('filament::login.fields.remember.label')),
        ];
    }

    public function render(): View
    {
        // return view('filament::login')
        return view('livewire.auth.login')
            ->layout('filament::components.layouts.card', [
                'title' => __('filament::login.title'),
            ]);
    }

    public function showCompleteAccountPage()
    {
        return redirect()->route('filament.resources.users.complete-account');
    }
}

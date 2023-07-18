<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Filament\Facades\Filament;
use Filament\Forms\Components;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Contracts\HasForms;
use Phpsa\FilamentPasswordReveal\Password;
use Filament\Forms\Components\TextInput\Mask;
use Illuminate\Validation\ValidationException;
use Filament\Forms\Concerns\InteractsWithForms;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

/**
 * @property ComponentContainer $form
 */
class CompleteAccount extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRateLimiting;

    public ?string $username = '';

    public ?string $fullname = '';

    public ?string $phone = '';

    public ?string $birthday = '';

    public ?string $password = '';

    public ?string $password_confirmation = '';

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $this->form->fill();
    }

    public function completeAccount(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'error' => __('filament::login.messages.throttled', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]),
            ]);
        }

        $data = $this->form->getState();

        $user = \App\Models\User::where('username', $data['username'])->first();

        if (
            $user->fullname !== $data['fullname'] ||
            $user->phone !== $data['phone'] ||
            $user->birthday->ne(\Carbon\Carbon::parse($data['birthday'])) ||
            $user->password !== null ||
            !$user->is_active
        ) {
            throw ValidationException::withMessages([
                'error' => __('auth.verification_failed'),
            ]);
        }

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        Filament::auth()->login($user);

        session()->regenerate();

        return app(LoginResponse::class);
    }

    protected function getFormSchema(): array
    {
        return [
            Components\Card::make([
                Components\Fieldset::make('verification')
                    ->label(__('auth.verification_required'))
                    ->schema([
                        Components\TextInput::make('username')
                            ->label(__('attr.username'))
                            ->required()
                            ->maxLength(255),
                        Components\TextInput::make('fullname')
                            ->label(__('attr.fullname'))
                            ->required()
                            ->maxLength(255)
                            ->autocomplete(),
                        Components\TextInput::make('phone')
                            ->label(__('attr.phone'))
                            ->tel()
                            ->required()
                            ->maxLength(255)
                            ->mask(fn (Mask $mask) => $mask->pattern('0000 000 00 00'))
                            ->autocomplete(),
                        Components\DatePicker::make('birthday')
                            ->label(__('attr.birthday'))
                            ->firstDayOfWeek(6)
                            ->displayFormat('d/m/Y')
                            ->required(),
                    ])->columns(),
                Components\Fieldset::make('password_setup')
                    ->label(__('auth.password_setup'))
                    ->schema([
                        Password::make('password')
                            ->label(__('filament::login.fields.password.label'))
                            ->showIcon('heroicon-o-eye-off')
                            ->hideIcon('heroicon-o-eye')
                            ->required()
                            ->confirmed()
                            ->maxLength(255),
                        Password::make('password_confirmation')
                            ->label(__('auth.password_confirmation'))
                            ->showIcon('heroicon-o-eye-off')
                            ->hideIcon('heroicon-o-eye')
                            ->required()
                            ->maxLength(255),
                    ])->columns(),
            ]),
        ];
    }

    public function render(): View
    {
        return view('livewire.auth.complete-account')
            ->layout('filament::components.layouts.card', [
                'title' => __('auth.complete_title'),
                'width' => '5xl',
            ]);
    }

    public function showLoginPage()
    {
        return redirect()->route('filament.auth.login');
    }
}

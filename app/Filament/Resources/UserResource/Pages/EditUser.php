<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\TextInput\Mask;


class EditUser extends EditRecord
{


    protected static string $resource = UserResource::class;

    protected ?string $maxContentWidth = 'full';



    protected function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    TextInput::make('fullname')
                        ->label(__('attr.fullname'))
                        ->required()
                        ->minLength(2)
                        ->maxLength(255),
                    TextInput::make('username')
                        ->label(__('attr.username'))
                        ->minLength(2)
                        ->maxLength(255)
                        ->required(),
                    Select::make('roles')
                        ->label(__('attr.role'))
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->preload()
                        ->reactive()
                        ->required(),
                    DatePicker::make('birthday')
                        ->label(__('attr.birthday'))
                        ->default(now())
                        ->displayFormat('d/m/Y')
                        ->required(),
                    TextInput::make('phone')
                        ->label(__('attr.phone'))
                        ->tel()
                        ->required()
                        ->maxLength(255)
                        ->mask(fn (Mask $mask) => $mask->pattern('0000 000 00 00'))
                        ->autocomplete(),
                    TextInput::make('password')
                        ->label(__('attr.password'))
                        ->minLength(8)
                        ->password()
                        ->disableAutocomplete()
                        ->same('passwordConfirmation')
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->dehydrated(fn ($state) => filled($state)),
                    TextInput::make('passwordConfirmation')
                        ->label(__('attr.passwordCon'))
                        ->password()
                        ->disableAutocomplete()
                        ->dehydrated(false)

                ])->columns(3),
        ];
    }


    protected function getActions(): array
    {
        return [
            Actions\ActionGroup::make([
                Actions\Action::make('deactivate')
                    ->label(__('attr.deactivate'))
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->hidden(!$this->record->is_active)
                    ->action(function () {
                        $this->record->update(['is_active' => false]);
                        Notification::make()
                            ->title(__('labels.notify.deactivate'))
                            ->danger()
                            ->send();
                    }),
                Actions\Action::make('activate')
                    ->label(__('attr.activate'))
                    ->hidden($this->record->is_active)
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(function () {
                        $this->record->update(['is_active' => true]);
                        Notification::make()
                            ->title(__('labels.notify.activate'))
                            ->success()
                            ->send();
                    }),
            ]),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
            $this->getCancelFormAction(),
        ];
    }

    protected function getTitle(): string
    {
        return trans_choice('user', 2);
    }

    public function getModelLabel(): string
    {
        return trans_choice('user', 1);
    }
}

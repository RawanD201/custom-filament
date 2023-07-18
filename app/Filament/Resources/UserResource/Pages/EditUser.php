<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{

    // use UserResource\HandleRecord;

    protected static string $resource = UserResource::class;

    // protected ?string $maxContentWidth = 'full';

    // protected static string $view = 'filament.resources.pages.user-edit-record';


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
        return __('labels.users.edit');
    }
}

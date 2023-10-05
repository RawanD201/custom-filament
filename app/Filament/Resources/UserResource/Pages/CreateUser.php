<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return  trans_choice('user', 1);
    }

    protected function getTitle(): string
    {
        return trans_choice('user', 1);
    }

    public function getModelLabel(): string
    {
        return trans_choice('user', 1);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

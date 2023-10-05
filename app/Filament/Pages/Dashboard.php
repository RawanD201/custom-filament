<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as Base;
use Filament\Widgets\AccountWidget;
use Illuminate\Contracts\View\View;

class Dashboard extends Base
{
    protected static ?string $title = 'Dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-table';

    // protected static string $view = 'filament.pages.dashboard';

    protected function getWidgets(): array
    {
        return [];
    }


    public function mount(): void
    {
        // abort_unless($user->hasAnyPermission(UserPermission::values()), 403);
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AccountWidget::class,
        ];
    }

    public  function getTitle(): string
    {
        return __('labels.dashboard');
    }

    public static function getNavigationLabel(): string
    {
        return __('labels.dashboard');
    }
}

<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Gate;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Filament\Navigation\NavigationGroup;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
            Filament::registerUserMenuItems($this->getUserMenu());

            // Navigation Group
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('labels.nav.group.buy')
                    ->icon('heroicon-s-view-list')
                    ->collapsible(),
                NavigationGroup::make()
                    ->label('labels.nav.group.management')
                    ->icon('heroicon-s-view-list')
                    ->collapsible(),
                NavigationGroup::make()
                    ->label('labels.nav.group.sell')
                    ->icon('heroicon-s-view-list')
                    ->collapsible(),
                NavigationGroup::make()
                    ->label('labels.nav.group.expenses')
                    ->icon('heroicon-s-clipboard')
                    ->collapsible(),
                NavigationGroup::make()
                    ->label('labels.nav.group.report')
                    ->icon('heroicon-s-document-duplicate')
                    ->collapsible(),
                NavigationGroup::make()
                    ->label('labels.nav.group.loans')
                    ->icon('heroicon-s-clipboard')
                    ->collapsible(),
                NavigationGroup::make()
                    ->label('labels.nav.group.settings')
                    ->icon('heroicon-s-cog')
                    ->collapsible(),

            ]);
        });


        Gate::define('create-backup', function () {
            return \auth()->user();
        });

        Gate::define('download-backup', function () {
            return \auth()->user();
        });

        Health::checks([
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
        ]);
    }




    private function getUserMenu()
    {
        $menu = [
            'lockscreen' => UserMenuItem::make()
                ->label(__('labels.nav.user_menu.lock_screen'))
                ->url(route('lockscreenpage'))
                ->icon('heroicon-s-lock-closed'),
        ];



        /** @var \App\Models\User */
        if ($user = auth()->user()) {

            $menu[] = UserMenuItem::make()
                ->label(__('labels.nav.user_menu.settings'))
                ->url(route('filament.resources.users.edit', auth()->id()))
                ->icon('heroicon-s-cog');
        }

        return $menu;
    }
}

<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Gate;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

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
        });


        Gate::define('create-backup', function () {
            return \auth()->user();
        });

        Gate::define('download-backup', function () {
            return \auth()->user();
        });
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

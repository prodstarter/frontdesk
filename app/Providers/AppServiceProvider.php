<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BezhanSalleh\PanelSwitch\PanelSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
            $panelSwitch
                ->simple()
                ->labels([
                    'admin' => 'Admin Panel',
                    'app' => 'App Dashboard',
                ])
                ->visible(fn (): bool => auth()->user()?->admin())
                ->canSwitchPanels(fn (): bool => auth()->user()?->admin())
                ->renderHook('panels::user-menu.before');
        });
    }
}

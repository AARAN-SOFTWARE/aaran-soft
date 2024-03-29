<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });

        Blade::if('editor', function () {
            return auth()->check() && auth()->user()->isEditor();
        });

        Blade::if('entry', function () {
            return auth()->check() && auth()->user()->isEntry();
        });

        Blade::if('magalir', function () {
            return auth()->check() && auth()->user()->isMagalir();
        });

        Blade::if('supervisor', function () {
            return auth()->check() && auth()->user()->isSupervisor();
        });
        //
    }
}

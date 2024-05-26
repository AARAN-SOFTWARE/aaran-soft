<?php

namespace Aaran\Developer\Providers;

use Illuminate\Support\ServiceProvider;

class DeveloperServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','common');

        $this->app->register(DeveloperRouteServiceProvider::class);
    }

}

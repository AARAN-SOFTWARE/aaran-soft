<?php

namespace Aaran\SpotMyNumber\Providers;

use Illuminate\Support\ServiceProvider;

class SpotMyNumberServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','master');

        $this->app->register(SpotMyNumberRouteServiceProvider::class);
    }

}

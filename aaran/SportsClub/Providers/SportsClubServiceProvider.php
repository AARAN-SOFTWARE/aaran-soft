<?php

namespace Aaran\SportsClub\Providers;

use Illuminate\Support\ServiceProvider;

class SportsClubServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','master');

        $this->app->register(SportsClubRouteServiceProvider::class);
    }

}

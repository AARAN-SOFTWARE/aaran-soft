<?php

namespace Aaran\ShareMarket\Providers;

use Illuminate\Support\ServiceProvider;

class ShareMarketServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','master');

        $this->app->register(ShareMarketRouteServiceProvider::class);
    }

}

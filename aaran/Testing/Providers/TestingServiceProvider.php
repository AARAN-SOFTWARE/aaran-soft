<?php

namespace Aaran\Testing\Providers;

use Illuminate\Support\ServiceProvider;

class TestingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','common');

        $this->app->register(TestingRouteServiceProvider::class);
    }

}

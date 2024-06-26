<?php

namespace Aaran\Welfare\Providers;

use Aaran\Taskmanager\Providers\TaskmanagerRouteServiceProvider;
use Illuminate\Support\ServiceProvider;

class WelfareServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','welfare');

        $this->app->register(WelfareRouteServiceProvider::class);
    }

}

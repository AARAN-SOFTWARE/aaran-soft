<?php

namespace Aaran\Attendance\Providers;

use Illuminate\Support\ServiceProvider;

class AttendanceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','master');

        $this->app->register(AttendanceRouteServiceProvider::class);
    }

}

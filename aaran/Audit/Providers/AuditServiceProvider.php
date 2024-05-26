<?php

namespace Aaran\Audit\Providers;

use Illuminate\Support\ServiceProvider;

class AuditServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','audits');

        $this->app->register(AuditRouteServiceProvider::class);
    }

}

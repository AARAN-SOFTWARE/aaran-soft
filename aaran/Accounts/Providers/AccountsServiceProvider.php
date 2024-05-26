<?php

namespace Aaran\Accounts\Providers;

use Illuminate\Support\ServiceProvider;

class AccountsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','master');

        $this->app->register(AccountsRouteServiceProvider::class);
    }

}

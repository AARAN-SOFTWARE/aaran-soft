<?php

namespace Aaran\Reports\Providers;

use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        $this->app->register(ReportRouteServiceProvider::class);
    }

}

<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetTenantIdInSession
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        session()->put('tenant_id', $event->user->tenant_id);

    }
}

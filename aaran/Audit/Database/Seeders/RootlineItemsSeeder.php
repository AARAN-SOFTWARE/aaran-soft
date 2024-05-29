<?php

namespace Aaran\Audit\Database\Seeders;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\Rootline;
use Aaran\Audit\Models\SalesTrack\RootlineItems;
use Illuminate\Database\Seeder;

class RootlineItemsSeeder extends Seeder
{
    public static function run(): void
    {
        RootlineItems::create([
            'serial' => '1',
            'rootline_id' => '1',
            'client_id' => '1',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        RootlineItems::create([
            'serial' => '2',
            'rootline_id' => '1',
            'client_id' => '2',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        RootlineItems::create([
            'serial' => '3',
            'rootline_id' => '1',
            'client_id' => '3',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        RootlineItems::create([
            'serial' => '4',
            'rootline_id' => '1',
            'client_id' => '4',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        RootlineItems::create([
            'serial' => '5',
            'rootline_id' => '1',
            'client_id' => '5',
            'active_id' => '1',
            'user_id' => '1'
        ]);
    }
}

<?php

namespace Aaran\Audit\Database\Seeders;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\Rootline;
use Illuminate\Database\Seeder;

class RootlineSeeder extends Seeder
{
    public static function run(): void
    {
        Rootline::create([
            'vname' => 'Rootline - 1',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        Rootline::create([
            'vname' => 'Rootline - 2',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        Rootline::create([
            'vname' => 'Rootline - 3',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        Rootline::create([
            'vname' => 'Rootline - 4',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        Rootline::create([
            'vname' => 'Rootline - 5',
            'active_id' => '1',
            'user_id' => '1'
        ]);
    }
}

<?php

namespace Aaran\Audit\Database\Seeders;

use Aaran\Audit\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public static function run(): void
    {
        Client::create([
            'vname' => 'SK ENTERPRISES',
            'group' => 'SUNDAR',
            'payable' => '1',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        Client::create([
            'vname' => 'AARAN INDIA FASHION',
            'group' => 'SUNDAR',
            'payable' => '1',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        Client::create([
            'vname' => 'PRAPTHI IMPEX',
            'group' => 'SUNDAR',
            'payable' => '1',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        Client::create([
            'vname' => 'FASHION FABRICS',
            'group' => 'SUNDAR',
            'payable' => '1',
            'active_id' => '1',
            'user_id' => '1'
        ]);

        Client::create([
            'vname' => 'SHONA EXPORTS',
            'group' => 'SUNDAR',
            'payable' => '1',
            'active_id' => '1',
            'user_id' => '1'
        ]);
    }
}

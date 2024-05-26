<?php

namespace Aaran\Audit\Database\Seeders;

use Aaran\Audit\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public static function run(): void
    {
        Client::create([
            'vname' => 'test',
            'group'=>'01',
            'payable'=>'1',
            'active_id' => '1',
            'company_id'=>'2',
            'user_id'=>'3'
        ]);
        Client::create([
            'vname' => 'fun',
            'group'=>'01',
            'payable'=>'1',
            'active_id' => '1',
            'company_id'=>'1',
            'user_id'=>'1'
        ]);


    }
}

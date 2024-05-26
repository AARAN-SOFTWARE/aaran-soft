<?php

namespace Aaran\Developer\Database\Seeders;

use Aaran\Common\Models\Bank;
use Illuminate\Database\Seeder;

class DemoRequestSeeder extends Seeder
{
    public static function run(): void
    {
        Bank::create([
            'vname' => '-',
            'active_id' => '1'
        ]);
    }
}

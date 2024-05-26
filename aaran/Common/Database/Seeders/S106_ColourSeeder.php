<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Colour;
use Illuminate\Database\Seeder;

class S106_ColourSeeder extends Seeder
{
    public static function run(): void
    {
        Colour::create([
            'vname' => '-',
            'active_id' => '1'
        ]);

        Colour::create([
            'vname' => 'Blue',
            'active_id' => '1'
        ]);

        Colour::create([
            'vname' => 'Pink',
            'active_id' => '1'
        ]);

        Colour::create([
            'vname' => 'Red',
            'active_id' => '1'
        ]);

        Colour::create([
            'vname' => 'Purple',
            'active_id' => '1'
        ]);

        Colour::create([
            'vname' => 'Yellow',
            'active_id' => '1'
        ]);

    }
}

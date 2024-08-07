<?php

namespace Aaran\Web\Database\Seeders;

use Aaran\Web\Models\Testimony;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    public static function run(): void
    {
        Testimony::create([
            'vname' => 'TRAINING',
            'description' => 'Effective and affordable way to achieve a result ',
            'image' => '-',
            'active_id' => 1,
            'user_id' => 1,
        ]);
    }
}

<?php

namespace Aaran\Web\Database\Seeders;

use Aaran\Web\Models\Stats;
use Illuminate\Database\Seeder;

class StatsSeeder extends Seeder
{
    public static function run(): void
    {
        Stats::create([
            'vname'=>'NUMBERS TELL OUR STORY ',
            'description'=>'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis',
            'active_id'=>1,
            'user_id'=>1,
        ]);
    }
}

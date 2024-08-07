<?php

namespace Aaran\Web\Database\Seeders;

use Aaran\Web\Models\StatsItem;
use Illuminate\Database\Seeder;

class StatsItemSeeder extends Seeder
{

    public static function run(): void
    {
        StatsItem::create([
            'stats_id'=>1,
            'count'=>'22',
            'heading'=>'Years of experience ',
            'description'=>'Since 2001',
        ]);
        StatsItem::create([
            'stats_id'=>1,
            'count'=>'25',
            'heading'=>'Masters',
            'description'=>' In last 15 years ',
        ]);
        StatsItem::create([
            'stats_id'=>1,
            'count'=>'375',
            'heading'=>'Matches',
            'description'=>' In last 15 years ',
        ]);
        StatsItem::create([
            'stats_id'=>1,
            'count'=>'250',
            'heading'=>'Champions',
            'description'=>' In last 15 years ',
        ]);
        StatsItem::create([
            'stats_id'=>1,
            'count'=>'3600',
            'heading'=>'Students',
            'description'=>' In last 15 years ',
        ]);
    }
}

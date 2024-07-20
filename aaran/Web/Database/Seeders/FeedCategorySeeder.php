<?php

namespace Aaran\Web\Database\Seeders;

use Aaran\Web\Models\FeedCategory;
use Illuminate\Database\Seeder;

class FeedCategorySeeder extends Seeder
{
    public static function run(): void
    {
        FeedCategory::create([
            'vname' => 'Sports Club',
            'active_id' => '1'
        ]);



    }
}

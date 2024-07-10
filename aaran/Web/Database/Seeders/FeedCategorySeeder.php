<?php

namespace Aaran\Web\Database\Seeders;

use Aaran\Web\Models\FeedCategory;
use Illuminate\Database\Seeder;

class FeedCategorySeeder extends Seeder
{
    public static function run(): void
    {
        FeedCategory::create([
            'vname' => 'Business',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Software',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Blog',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Fashion',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Lifestyle',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Travel',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Finance',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Music',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Personal',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'DIY',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Food',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Sports',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Health',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Fitness',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'News',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Parenting',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Books',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Music',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Politics',
            'active_id' => '1'
        ]);
        FeedCategory::create([
            'vname' => 'Beauty',
            'active_id' => '1'
        ]);


    }
}

<?php

namespace Aaran\Web\Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    protected $Truncate = [];

    public static function run(): void
    {
        \Aaran\Web\Models\Tag::firstOrcreate([
            'feed_category_id' => '1',
            'vname' => 'Activities',
            'active_id' => '1'
        ]);

        \Aaran\Web\Models\Tag::firstOrcreate([
            'feed_category_id' => '1',
            'vname' => 'Events',
            'active_id' => '1'
        ]);

        \Aaran\Web\Models\Tag::firstOrcreate([
            'feed_category_id' => '1',
            'vname' => 'Achievement',
            'active_id' => '1'
        ]);


        \Aaran\Web\Models\Tag::firstOrcreate([
            'feed_category_id' => '1',
            'vname' => 'News',
            'active_id' => '1'
        ]);

        \Aaran\Web\Models\Tag::firstOrcreate([
            'feed_category_id' => '1',
            'vname' => 'Blog',
            'active_id' => '1'
        ]);

        \Aaran\Web\Models\Tag::firstOrcreate([
            'feed_category_id' => '1',
            'vname' => 'Upcoming Events',
            'active_id' => '1'
        ]);

        \Aaran\Web\Models\Tag::firstOrcreate([
            'feed_category_id' => '1',
            'vname' => 'Moments',
            'active_id' => '1'
        ]);

        \Aaran\Web\Models\Tag::firstOrcreate([
            'feed_category_id' => '1',
            'vname' => 'Gallery',
            'active_id' => '1'
        ]);

    }
}

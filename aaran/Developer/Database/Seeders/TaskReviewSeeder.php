<?php

namespace Aaran\Developer\Database\Seeders;

use Aaran\Developer\Models\TaskReview;
use Illuminate\Database\Seeder;

class TaskReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskReview::create([5]);
    }
}

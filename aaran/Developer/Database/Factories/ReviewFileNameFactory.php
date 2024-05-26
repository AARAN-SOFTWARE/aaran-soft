<?php

namespace Aaran\Developer\Database\Factories;

use Aaran\Developer\Models\ReviewFileName;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFileNameFactory extends Factory
{
    protected $model = ReviewFileName::class;
    public function definition(): array
    {
        return [
            'vname' => $this->faker->name(),
            'active_id' => 1
        ];
    }
}


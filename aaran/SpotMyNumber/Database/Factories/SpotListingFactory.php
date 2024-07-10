<?php

namespace Aaran\SpotMyNumber\Database\Factories;

use Aaran\SpotMyNumber\Models\SpotListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpotListingFactory extends Factory
{
    protected $model = SpotListing::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}

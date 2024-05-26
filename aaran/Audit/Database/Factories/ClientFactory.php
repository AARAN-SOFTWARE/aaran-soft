<?php

namespace Aaran\Audit\Database\Factories;

use Aaran\Audit\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;
    public function definition(): array
    {
        return [
           'vname' => $this->faker->unique()->name(),
            'group' => $this->faker->unique()->word(),
            'payable' => 1,
            'active_id' => 1,
            'user_id' => 1,
        ];
    }
}

<?php

namespace Aaran\Master\Database\Factories;

use Aaran\Master\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrderFactory extends Factory
{
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'vname' => $this->faker->randomNumber(),
            'order_name' => $this->faker->name(),
            'company_id' => '1',
            'active_id' => '1'
        ];
    }
}

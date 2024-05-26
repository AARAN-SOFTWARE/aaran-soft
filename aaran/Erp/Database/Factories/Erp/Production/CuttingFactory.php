<?php

namespace Aaran\Erp\Database\Factories\Erp\Production;

use Aaran\Erp\Models\Production\Cutting;
use Illuminate\Database\Eloquent\Factories\Factory;

class CuttingFactory extends Factory
{
    protected $model = Cutting::class;
    public function definition(): array
    {
        return [
            'vname' => $this->faker->name(),
            'active_id' => '1',
        ];
    }
}

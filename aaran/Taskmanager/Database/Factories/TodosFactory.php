<?php

namespace Aaran\Taskmanager\Database\Factories;

use Aaran\Taskmanager\Models\Todos;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodosFactory extends Factory
{
    protected $model = Todos::class;

    public function definition(): array
    {
        return [
            'slno' => $this->faker->numberBetween(1,100),
            'date' => $this->faker->date,
            'vname' => $this->faker->title,
            'completed' => 'false',
            'active_id' => '1',
        ];
    }
}

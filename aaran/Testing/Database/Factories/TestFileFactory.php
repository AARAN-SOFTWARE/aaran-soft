<?php

namespace Aaran\Testing\Database\Factories;

use Aaran\Testing\Models\TestFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFileFactory extends Factory
{
    protected $model = TestFile::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}

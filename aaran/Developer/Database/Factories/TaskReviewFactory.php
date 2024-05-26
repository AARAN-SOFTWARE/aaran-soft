<?php

namespace Aaran\Developer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Aaran\Developer\Models\TaskReview>
 */
class TaskReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'assignee' => $this->faker->name(),
            'status'=>$this->faker->randomElement(['pending','completed']),
            'completed'=> 1,
        ];
    }
}

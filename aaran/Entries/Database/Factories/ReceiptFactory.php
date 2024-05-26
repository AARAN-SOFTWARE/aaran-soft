<?php

namespace Aaran\Entries\Database\Factories;

use Aaran\Entries\Models\Payment;
use Aaran\Entries\Models\Receipt;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReceiptFactory extends Factory
{
    protected $model = Receipt::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'vname' => $this->faker->word(),
            'active_id' => $this->faker->word(),
        ];
    }
}

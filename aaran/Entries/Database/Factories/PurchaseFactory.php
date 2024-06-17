<?php

namespace Aaran\Entries\Database\Factories;

use Aaran\Entries\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{

    protected $model = Purchase::class;
    public function definition(): array
    {
        return [
            'uniqueno' => $this->faker->unique()->numberBetween(1, 9999),
            'acyear' => 8,
            'company_id' => 1,
            'contact_id' => 1,
            'order_id' =>  1,
            'purchase_no' => $this->faker->unique()->numberBetween(1, 9999),
            'purchase_date' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'Entry_no' => Purchase::nextNo(),
            'sales_type' => 1,
            'transport_id' =>  1,
            'bundle' => 5,
            'total_qty' => $this->faker->numberBetween(1, 9999),
            'total_taxable' =>$this->faker->numberBetween(1, 9999),
            'total_gst' => $this->faker->numberBetween(1, 9999),
            'ledger_id' => 1,
            'additional' => 0,
            'round_off' => 0,
            'grand_total' => $this->faker->numberBetween(1, 9999),
            'active_id' => 1,
        ];
    }
}

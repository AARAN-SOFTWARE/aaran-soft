<?php

namespace Aaran\Entries\Database\Factories;

use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;


class SaleFactory extends Factory
{
    protected $model = Sale::class;
    public function definition(): array
    {
        $contact=Contact::pluck('id');
        $no=1;
        return [
            'uniqueno' => $this->faker->unique()->numberBetween(1, 9999),
            'acyear' => 8,
            'company_id' => 1,
            'contact_id' => 1,
            'invoice_no' => $no++,
            'invoice_date' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'order_id' =>  1,
            'billing_id' => 1,
            'shipping_id' => 1,
            'style_id' => 1 ,
            'despatch_id' => 1,
            'job_no' => $this->faker->unique()->numberBetween(1, 9999),
            'sales_type' => 1,
            'transport_id' =>  1,
            'destination' => $this->faker->company(),
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

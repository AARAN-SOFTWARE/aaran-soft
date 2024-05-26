<?php

namespace Aaran\Master\Database\Factories;

use Aaran\Common\Models\Hsncode;
use Aaran\Master\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $users = User::pluck('id');
        $hsncodes = Hsncode::pluck('id');

        return [
            'vname' => $this->faker->unique()->word(),
            'product_type' => '1',
            'hsncode_id' => $hsncodes->random(),
            'units' => '4',
            'gst_percent' => '5',
            'active_id' => '1',
            'company_id' => '1',
            'user_id' => $users->random(),

        ];
    }
}




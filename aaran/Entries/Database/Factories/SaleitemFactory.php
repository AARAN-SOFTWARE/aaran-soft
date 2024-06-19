<?php

namespace Aaran\Entries\Database\Factories;

use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Size;
use Aaran\Entries\Models\Sale;
use Aaran\Entries\Models\Saleitem;
use Aaran\Master\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleitemFactory extends Factory
{
    protected $model = Saleitem::class;
    public function definition(): array
    {
        $product=Product::pluck('id');
        $colour=Colour::pluck('id');
        $size=Size::pluck('id');
        return [
            'po_no'=>$this->faker->numberBetween(1,1000),
            'dc_no'=>$this->faker->numberBetween(1,1000),
            'no_of_roll'=>$this->faker->numberBetween(1,1000),
            'product_id'=>$product->random(),
            'description'=>$this->faker->text(25),
            'colour_id'=>$colour->random(),
            'size_id'=>$size->random(),
            'qty'=>$this->faker->numberBetween(1,1000),
            'price'=>$this->faker->numberBetween(1,500),
            'gst_percent'=>5,
            'sale_id' => Sale::factory(),
        ];
    }
}

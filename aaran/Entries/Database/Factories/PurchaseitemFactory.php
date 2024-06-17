<?php

namespace Aaran\Entries\Database\Factories;

use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Size;
use Aaran\Entries\Models\Purchase;
use Aaran\Entries\Models\Purchaseitem;
use Aaran\Master\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseitemFactory extends Factory
{
    protected $model = Purchaseitem::class;
    public function definition(): array
    {
        $product=Product::pluck('id');
        $colour=Colour::pluck('id');
        $size=Size::pluck('id');
        return [
            'product_id'=>$product->random(),
            'description'=>$this->faker->text(25),
            'colour_id'=>$colour->random(),
            'size_id'=>$size->random(),
            'qty'=>$this->faker->numberBetween(1,1000),
            'price'=>$this->faker->numberBetween(1,500),
            'gst_percent'=>5,
            'purchase_id' => Purchase::factory(),
        ];
    }
}

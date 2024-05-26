<?php

namespace Aaran\Master\Database\Seeders;

use Aaran\Master\Models\Product;
use Illuminate\Database\Seeder;

class S203_ProductSeeder extends Seeder
{
    public static function run(): void
    {
        Product::create([
            'vname' => '-',
            'product_type' => '1',
            'hsncode_id' => '1',
            'units' => '1',
            'gst_percent' => '0',
            'active_id' => '1',
            'company_id'=>'1',
            'user_id' => '1'
        ]);
    }
}

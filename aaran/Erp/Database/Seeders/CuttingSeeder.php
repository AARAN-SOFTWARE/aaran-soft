<?php

namespace Aaran\Erp\Database\Seeders;

use Aaran\Erp\Models\Production\Cutting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Aaran\Erp\Models\Production\CuttingItem;
use Illuminate\Database\Seeder;

class CuttingSeeder extends Seeder
{
    public static function run(): void
    {
      Cutting::create([
            'vno' => '1',
            'vdate' => '2024-03-05',
            'order_id' => '1',
            'jobcard_id' => '1',
            'cutting_master' => '1',
            'total_qty' => '2',
            'active_id' => '1',
            'company_id' => '1',
            'user_id' => '1'
        ]);

        CuttingItem::create([

            'cutting_id' => '1',
            'jobcard_item_id' => '1',
            'fabric_lot_id' => '1',
            'colour_id' => '1',
            'size_id' => '1',
            'qty' => '5',
            'pending_qty' => '3',
            'active_id' => '1'
        ]);

//        $cutting = Cutting::create([
//            'vno' => '2',
//            'vdate' => '2024-03-05',
//            'order_id' => '1',
//            'jobcard_id' => '1',
//            'cutting_master' => '2',
//            'total_qty' => '3',
//            'active_id' => '1',
//            'company_id' => '1',
//            'user_id' => '1'
//        ]);
//
//        CuttingItem::create([
//
//            'cutting_id' => $cutting->id,
//            'jobcard_item_id' => '1',
//            'fabric_lot_id' => '1',
//            'colour_id' => '1',
//            'size_id' => '1',
//            'qty' => '7',
//            'pending_qty' => '3',
//            'active_id' => '1'
//        ]);

    }
}

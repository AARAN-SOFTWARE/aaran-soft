<?php

namespace Aaran\Erp\Database\Seeders;

use Aaran\Erp\Models\Production\Jobcard;
use Aaran\Erp\Models\Production\JobcardItem;
use Illuminate\Database\Seeder;

class JobcardSeeder extends Seeder
{
    public static function run(): void
    {
        $job = Jobcard::create([
            'vno' => '101',
            'vdate' => '2023-10-19',
            'order_id' => '1',
            'style_id' => '1',
            'total_qty' => 200,
            'active_id' => '1',
            'company_id' => '1',
            'user_id' => '1'
        ]);

        JobcardItem::create([
            'jobcard_id' => $job->id,
            'fabric_lot_id' => '1',
            'colour_id' => '1',
            'size_id' => '1',
            'qty' => 200,
            'cutting_qty' => '0',
            'pe_out_qty' => '0',
            'pe_in_qty' => '0',
            'se_out_qty' => '0',
            'se_in_qty' => '0',
            'active_id' => '1',
        ]);

//        //
//        // 102
//        //
//
//       Jobcard::create([
//            'vno' => '102',
//            'vdate' => '2023-10-18',
//            'order_id' => '2',
//            'style_id' => '2',
//            'total_qty' => 400,
//            'active_id' => '1',
//            'user_id' => '1',
//        ]);
//
//        //
//        // 103
//        //
//
//  Jobcard::create([
//            'vno' => '103',
//            'vdate' => '2023-10-16',
//            'order_id' => '3',
//            'style_id' => '3',
//            'total_qty' => 600,
//            'active_id' => '1',
//            'user_id' => '1',
//        ]);


    }
}

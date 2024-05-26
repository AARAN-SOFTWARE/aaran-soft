<?php

namespace Aaran\Erp\Database\Seeders;

use Aaran\Erp\Models\Production\Ironing;
use Aaran\Erp\Models\Production\IroningItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IroningSeeder extends Seeder
{
    public static function run(): void
    {
     $ironing = Ironing::create([
            'vno' => '101',
            'vdate' => '2023-10-19',
            'iron_master' => 'master',
            'order_id' => '1',
            'style_id' => '1',
            'jobcard_id' => '1',
            'total_qty' => 200,
            'receiver_details' => 'pip',
            'active_id' => '1',
            'company_id' => '1',
            'user_id' => '1'
            ]);

        IroningItem::create([

            'ironing_id' => $ironing->id,
            'section_inward_item_id' => '1',
            'jobcard_item_id' => '1',
            'colour_id' => '1',
            'size_id' => '1',
            'qty' => '0',
            'active_id' => '1'

        ]);
    }
}

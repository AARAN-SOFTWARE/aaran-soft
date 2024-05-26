<?php

namespace Aaran\Erp\Database\Seeders;

use Aaran\Erp\Models\Production\PeOutward;
use Aaran\Erp\Models\Production\PeOutwardItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeOutwardSeeder extends Seeder
{
    public static function run(): void
    {
      $peoutward =  PeOutward::create([
            'vno' => '101',
            'vdate' => '2023-10-19',
            'contact_id' => '1',
            'jobcard_id' => '1',
            'total_qty' => 200,
            'receiver_details' => 'pip',
            'active_id' => '1',
            'company_id' => '1',
            'user_id' => '1'
        ]);

        PeOutwardItem::create([

            'Pe_outward_id' => $peoutward ->id,
            'jobcard_item_id' => '1',
            'cutting_item_id' => '1',
            'colour_id' => '1',
            'size_id' => '1',
            'qty' => '0',
            'pending_qty' => '0',
            'active_id' => '1'
        ]);
    }
}

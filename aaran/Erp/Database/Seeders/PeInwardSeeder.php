<?php

namespace Aaran\Erp\Database\Seeders;

use Aaran\Erp\Models\Production\PeInward;
use Aaran\Erp\Models\Production\PeInwardItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeInwardSeeder extends Seeder
{
    public static function run(): void
    {
       $peinward = PeInward::create([
            'vno' => '101',
            'vdate' => '2023-10-19',
            'contact_id' => '1',
            'jobcard_id' => '1',
            'contact_dc' => '1',
            'dc_date' => '2023-10-19',
            'total_qty' => 200,
            'receiver_details' => 'pip',
            'active_id' => '1',
            'company_id' => '1',
            'user_id' => '1'
        ]);

        PeInwardItem::create([

            'Pe_inward_id' => $peinward->id,
            'jobcard_item_id' => '1',
            'pe_outward_item_id' => '1',
            'colour_id' => '1',
            'size_id' => '1',
            'qty' => '0',
            'pending_qty' => '0',
            'active_id' => '1'
        ]);
    }
}

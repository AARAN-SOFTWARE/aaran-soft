<?php

namespace Aaran\Erp\Database\Seeders;

use Aaran\Erp\Models\Production\SectionInwardItem;
use Aaran\Erp\Models\Production\SectionInward;
use Illuminate\Database\Seeder;

class SectionInwardSeeder extends Seeder
{
    public static function run(): void
    {
        $sectioninward = SectionInward::create([
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
        SectionInwardItem::create([

            'section_inward_id' => $sectioninward ->id,
            'jobcard_item_id' => '1',
            'section_outward_item_id' => '1',
            'colour_id' => '1',
            'size_id' => '1',
            'qty' => '0',
            'pending_qty' => '0',
            'active_id' => '1',
        ]);
    }
}

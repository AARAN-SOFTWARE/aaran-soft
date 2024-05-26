<?php

namespace Aaran\Erp\Database\Seeders;

use Aaran\Erp\Models\Production\SectionOutwardItem;
use Aaran\Erp\Models\Production\SectionOutward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionOutwardSeeder extends Seeder
{
    public static function run(): void
    {
       $sectionoutward = SectionOutward::create([
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

        SectionOutwardItem::create([

            'section_outward_id' => $sectionoutward ->id,
            'jobcard_item_id' => '1',
            'pe_inward_item_id' => '1',
            'colour_id' => '1',
            'size_id' => '1',
            'qty' => '0',
            'pending_qty' => '0',
            'active_id' => '1',
        ]);
    }
}

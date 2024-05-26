<?php

namespace Aaran\Erp\Database\Seeders;

use Aaran\Erp\Models\Fabrication\FabricLot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricLotSeeder extends Seeder
{
    public static function run(): void
    {
        FabricLot::create([
            'vname' => 'Cotton',
            'desc' => '1',
            'active_id' => '1',
            'company_id' => '1',
            'user_id' => '1'
        ]);

    }
}

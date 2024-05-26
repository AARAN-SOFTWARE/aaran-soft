<?php

namespace Aaran\Master\Database\Seeders;

use Aaran\Master\Models\Company;
use Illuminate\Database\Seeder;

class S201_CompanySeeder extends Seeder
{
    public static function run(): void
    {
        Company::create([
            'vname' => '-',
            'display_name' => '-',
            'address_1' => '-',
            'address_2' => '-',
            'mobile' => '-',
            'landline' => '-',
            'gstin' => '-',
            'pan' => '-',
            'email' => '-',
            'website' => '-',
            'city_id' => '1',
            'state_id' => '1',
            'pincode_id' => '1',
            'active_id' => '1',
            'user_id' => '1',
            'tenant_id' => '1',
            'logo' => '-'
        ]);
    }
}

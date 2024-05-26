<?php

namespace Aaran\Master\Database\Seeders;

use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use Illuminate\Database\Seeder;

class S202_ContactSeeder extends Seeder
{
    public static function run(): void
    {
        Contact::create([
            'vname' => '-',
            'mobile' => '-',
            'whatsapp' => '-',
            'contact_person' => '-',
            'contact_type' => '1',
            'msme_no' => '-',
            'msme_type' => '-',
            'opening_balance' => '0',
            'effective_from' => '-',
            'active_id' => '1',
            'user_id' => '1',
            'company_id' => '1',
        ]);


        Contact_detail::create([
            'contact_id' => '1',
            'address_type' => 'Primary',
            'address_1' => '-',
            'address_2' => '-',
            'city_id' => '1',
            'state_id' => '1',
            'pincode_id' => '1',
            'country_id' => '1',
            'gstin' => '-',
            'email' => '-',
        ]);
    }
}

<?php

namespace Aaran\SportsClub\Database\Seeders;

use Aaran\SportsClub\Models\SportClub;
use Illuminate\Database\Seeder;

class S3001_SportClubSeeder extends Seeder
{
    public static function run(): void
    {
        SportClub::create([
            'vname' => '-',
            'master_name' => '-',
            'mobile' => '-',
            'whatsapp' => '-',
            'email' => '-',
            'address_1' => '-',
            'address_2' => '-',
            'city_id' => '1',
            'state_id' => '1',
            'pincode_id' => '1',
            'started_at' => '1',
            'club_photo' => '-',
            'active_id' => '1',
            'user_id' => '1',
            'tenant_id' => '1',
        ]);
    }
}

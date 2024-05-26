<?php

namespace Database\Seeders;

use App\Models\DefaultCompany;
use App\Models\Role;
use Illuminate\Database\Seeder;

class S02_RoleSeeder extends Seeder
{
    public static function run(): void
    {
        Role::create([
            'vname' => 'admin',
            'active_id' => '1'
        ]);
    }
}

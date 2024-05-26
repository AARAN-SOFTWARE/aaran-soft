<?php

namespace Database\Seeders;

use App\Models\DefaultCompany;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class S03_UserSeeder extends Seeder
{
    public static function run(): void
    {
        User::create([
            'name' => 'sundar',
            'email' => 'sundar@sundar.com',
            'password' => bcrypt('kalarani'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'tenant_id' => '1',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Developer',
            'email' => 'developer@aaran.org',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'tenant_id' => '1',
            'role_id' => '1'
        ]);


        User::create([
            'name' => 'Audit',
            'email' => 'audit@aaran.org',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'tenant_id' => '1',
            'role_id' => '1'
        ]);

//        User::create([
//            'name' => 'Jagadeesh',
//            'email' => 'Jagadeesh@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
//
//        User::create([
//            'name' => 'Divya',
//            'email' => 'divya@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
//
//        User::create([
//            'name' => 'Kalaiarasan',
//            'email' => 'kalaiarasan@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
//
//        User::create([
//            'name' => 'Alagiri Sankar',
//            'email' => 'alagiri@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
//
//        User::create([
//            'name' => 'kapinjal',
//            'email' => 'kapi@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
//
//        User::create([
//            'name' => 'SATHISHKUMAR',
//            'email' => 'sathish@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
//
//        User::create([
//            'name' => 'KALARANI',
//            'email' => 'kalarani@aaran.org',
//            'password' => bcrypt('123456789'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'tenant_id' => '1',
//            'role_id' => '1'
//        ]);
    }
}

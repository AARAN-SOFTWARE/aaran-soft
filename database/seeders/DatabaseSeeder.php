<?php

namespace Database\Seeders;

use Aaran\Common\Database\Seeders\CitySeeder;
use Aaran\Common\Database\Seeders\ColourSeeder;
use Aaran\Common\Database\Seeders\CountrySeeder;
use Aaran\Common\Database\Seeders\DepartmentSeeder;
use Aaran\Common\Database\Seeders\HsncodeSeeder;
use Aaran\Common\Database\Seeders\LedgerSeeder;
use Aaran\Common\Database\Seeders\PincodeSeeder;
use Aaran\Common\Database\Seeders\ReceipttypeSeeder;
use Aaran\Common\Database\Seeders\SizeSeeder;
use Aaran\Common\Database\Seeders\StateSeeder;
use Aaran\Common\Database\Seeders\TransportSeeder;
use Aaran\Entries\Database\Seeders\SaleSeeder;
use Aaran\Erp\Database\Seeders\CuttingItemSeeder;
use Aaran\Erp\Database\Seeders\CuttingSeeder;
use Aaran\Erp\Database\Seeders\FabricLotSeeder;
use Aaran\Erp\Database\Seeders\IroningItemSeeder;
use Aaran\Erp\Database\Seeders\IroningSeeder;
use Aaran\Erp\Database\Seeders\JobcardSeeder;
use Aaran\Erp\Database\Seeders\PeInwardSeeder;
use Aaran\Erp\Database\Seeders\PeOutwardSeeder;
use Aaran\Erp\Database\Seeders\SectionInwardSeeder;
use Aaran\Erp\Database\Seeders\SectionOutwardSeeder;
use Aaran\Master\Database\Seeders\CompanySeeder;
use Aaran\Master\Database\Seeders\ContactSeeder;
use Aaran\Master\Database\Seeders\ProductSeeder;
use Aaran\Orders\Database\Seeders\OrderSeeder;
use Aaran\Orders\Database\Seeders\StyleSeeder;
use App\Models\Blog\Post;
use App\Models\Tenant;
use App\Models\User;
use Database\Factories\Blog\PostFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::create(['t_name'=>'Aaran']);
        Tenant::create(['t_name'=>'test']);
        User::create([
            'name' => 'sundar',
            'email' => 'sundar@sundar.com',
            'password' => bcrypt('kalarani'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'tenant_id'=> '1',
        ]);

        User::create([
            'name' => 'divya',
            'email' => 'divya@aaran.org',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'tenant_id'=> '1'
        ]);

        User::create([
            'name' => 'Jagadeesh',
            'email' => 'jagadeesh@aaran.org',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'tenant_id'=> '2'
        ]);

        User::create([
            'name' => 'kalaiyarasan',
            'email' => 'kalaiyarasan@aaran.org',
            'password' => bcrypt('987654321'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'tenant_id'=> '1'
        ]);

        CitySeeder::run();
        StateSeeder::run();
        CountrySeeder::run();
        PincodeSeeder::run();

        HsncodeSeeder::run();
        ColourSeeder::run();
        DepartmentSeeder::run();
        LedgerSeeder::run();
        ReceipttypeSeeder::run();
        SizeSeeder::run();
        TransportSeeder::run();

        CompanySeeder::run();
        DefaultCompanySeeder::run();
        ContactSeeder::run();
        ProductSeeder::run();


        OrderSeeder::run();
        StyleSeeder::run();
        FabricLotSeeder::run();


        JobcardSeeder::run();
        CuttingSeeder::run();
        PeOutwardSeeder::run();
        PeInwardSeeder::run();
        SectionOutwardSeeder::run();
        SectionInwardSeeder::run();
        IroningSeeder::run();

        SaleSeeder::run();


        Post::factory(10)->create();

    }
}

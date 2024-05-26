<?php

namespace Database\Seeders;

use Aaran\Common\Database\Seeders\BankSeeder;
use Aaran\Common\Database\Seeders\S101_CitySeeder;
use Aaran\Common\Database\Seeders\S102_StateSeeder;
use Aaran\Common\Database\Seeders\S103_PincodeSeeder;
use Aaran\Common\Database\Seeders\S104_CountrySeeder;
use Aaran\Common\Database\Seeders\S105_HsncodeSeeder;
use Aaran\Common\Database\Seeders\S106_ColourSeeder;
use Aaran\Common\Database\Seeders\S107_SizeSeeder;
use Aaran\Common\Database\Seeders\S108_TransportSeeder;
use Aaran\Common\Database\Seeders\S109_LedgerSeeder;
use Aaran\Common\Database\Seeders\S110_BankSeeder;
use Aaran\Common\Database\Seeders\S111_ReceipttypeSeeder;
use Aaran\Common\Database\Seeders\S112_DepartmentSeeder;
use Aaran\Common\Database\Seeders\S113_CategorySeeder;
use Aaran\Common\Database\Seeders\S114_DespatcheSeeder;
use Aaran\Developer\Database\Seeders\ReviewFileNameSeeder;
use Aaran\Developer\Database\Seeders\TaskReviewSeeder;
use Aaran\Developer\Models\ReviewFileName;
use Aaran\Erp\Database\Seeders\FabricLotSeeder;
use Aaran\Master\Database\Seeders\S201_CompanySeeder;
use Aaran\Master\Database\Seeders\S202_ContactSeeder;
use Aaran\Master\Database\Seeders\S203_ProductSeeder;
use Aaran\Master\Database\Seeders\S204_OrderSeeder;
use Aaran\Master\Database\Seeders\S205_StyleSeeder;
//use Aaran\Orders\Database\Seeders\OrderSeeder;
//use Aaran\Orders\Database\Seeders\StyleSeeder;
use Aaran\Testing\Database\Seeders\TestFileSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
//sys
        S01_TenantSeeder::run();
        S02_RoleSeeder::run();
        S03_UserSeeder::run();
        S04_DefaultCompanySeeder::run();
        S05_SoftVersionSeeder::run();

//common
        S101_CitySeeder::run();
        S102_StateSeeder::run();
        S103_PincodeSeeder::run();
        S104_CountrySeeder::run();
        S105_HsncodeSeeder::run();
        S106_ColourSeeder::run();
        S107_SizeSeeder::run();
        S108_TransportSeeder::run();
        S109_LedgerSeeder::run();
        S110_BankSeeder::run();
        S111_ReceipttypeSeeder::run();
        S112_DepartmentSeeder::run();
        S113_CategorySeeder::run();
        S114_DespatcheSeeder::run();

//master
        S201_CompanySeeder::run();
        S202_ContactSeeder::run();
        S203_ProductSeeder::run();
        S204_OrderSeeder::run();
        S205_StyleSeeder::run();

//testing
        TestFileSeeder::run();
    }

}

<?php

namespace Database\Seeders;

use Aaran\Aadmin\Database\Migrations\RefactorMigrationTable;
use Aaran\Aadmin\Src\DbMigration;
use Illuminate\Database\Seeder;

class S00_MigrationSeeder extends Seeder
{
    public static function run(): void
    {
        if (!DbMigration::hasDemo()) {

            RefactorMigrationTable::clear('2024_03_01_000101_create_cities_table');
        }

        if (!DbMigration::hasCore()) {
            RefactorMigrationTable::clear('2024_03_01_000001_create_tenants_table');
            RefactorMigrationTable::clear('2024_03_01_000002_create_roles_table');
            RefactorMigrationTable::clear('2024_03_01_000003_create_users_table');
            RefactorMigrationTable::clear('2024_03_01_000004_add_two_factor_columns_to_users_table');
            RefactorMigrationTable::clear('2024_03_01_000005_create_cache_table');
            RefactorMigrationTable::clear('2024_03_01_000006_create_jobs_table');
            RefactorMigrationTable::clear('2024_03_01_000007_create_personal_access_tokens_table');
            RefactorMigrationTable::clear('2024_03_01_000008_create_default_companies_table');
            RefactorMigrationTable::clear('2024_03_01_000009_create_soft_versions_table');
        }

        if (!DbMigration::hasLocation()) {
            RefactorMigrationTable::clear('2024_03_01_000101_create_cities_table');
            RefactorMigrationTable::clear('2024_03_01_000102_create_states_table');
            RefactorMigrationTable::clear('2024_03_01_000103_create_pincodes_table');
            RefactorMigrationTable::clear('2024_03_01_000104_create_countries_table');
        }

    }
}

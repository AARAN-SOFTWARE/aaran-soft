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
        if (!DbMigration::hasEntry()) {
            RefactorMigrationTable::clear('2024_03_01_000301_create_sales_table');
            RefactorMigrationTable::clear('2024_03_01_000302_create_saleitems_table');
            RefactorMigrationTable::clear('2024_03_01_000303_create_purchases_table');
            RefactorMigrationTable::clear('2024_03_01_000304_create_purchaseitems_table');
            RefactorMigrationTable::clear('2024_03_01_000305_create_receipts_table');
            RefactorMigrationTable::clear('2024_03_01_000306_create_payments_table');
        }

        if (!DbMigration::hasDebitNote()) {
            RefactorMigrationTable::clear('2024_03_01_000309_create_debit_notes_table');
            RefactorMigrationTable::clear('2024_03_01_000310_create_debit_noteitems_table');
        }

        if (!DbMigration::hasCreditNote()) {
            RefactorMigrationTable::clear('2024_03_01_000307_create_credit_notes_table');
            RefactorMigrationTable::clear('2024_03_01_000308_create_credit_noteitems_table');
        }

        if (!DbMigration::hasErp()) {
            RefactorMigrationTable::clear('2024_03_01_000401_create_fabric_lots_table');
            RefactorMigrationTable::clear('2024_03_01_000402_create_jobcards_table');
            RefactorMigrationTable::clear('2024_03_01_000403_create_cuttings_table');
            RefactorMigrationTable::clear('2024_03_01_000404_create_pe_outwards_table');
            RefactorMigrationTable::clear('2024_03_01_000405_create_pe_inwards_table');
            RefactorMigrationTable::clear('2024_03_01_000406_create_section_outwards_table');
            RefactorMigrationTable::clear('2024_03_01_000407_create_section_inwards_table');
            RefactorMigrationTable::clear('2024_03_01_000408_create_ironings_table');
        }

    }
}

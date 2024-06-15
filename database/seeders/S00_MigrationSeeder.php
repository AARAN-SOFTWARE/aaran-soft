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

        if (!DbMigration::hasHsnCode()) {
            RefactorMigrationTable::clear('2024_03_01_000105_create_hsn_codes_table');
        }

        if (!DbMigration::hasCategory()) {
            RefactorMigrationTable::clear('2024_03_01_000106_create_categories_table');
        }

        if (!DbMigration::hasColour()) {
            RefactorMigrationTable::clear('2024_03_01_000107_create_colours_table');
        }

        if (!DbMigration::hasSize()) {
            RefactorMigrationTable::clear('2024_03_01_000108_create_sizes_table');
        }

        if (!DbMigration::hasDepartment()) {
            RefactorMigrationTable::clear('2024_03_01_000109_create_departments_table');
        }

        if (!DbMigration::hasLedger()) {
            RefactorMigrationTable::clear('2024_03_01_000110_create_ledgers_table');
        }

        if (!DbMigration::hasTransport()) {
            RefactorMigrationTable::clear('2024_03_01_000111_create_transports_table');
        }

        if (!DbMigration::hasBank()) {
            RefactorMigrationTable::clear('2024_03_01_000112_create_bank_table');
        }

        if (!DbMigration::hasReceiptType()) {
            RefactorMigrationTable::clear('2024_03_01_000113_create_receipt_types_table');
        }

        if (!DbMigration::hasDespatch()) {
            RefactorMigrationTable::clear('2024_03_01_000114_create_despatches_table');
        }

        if (!DbMigration::hasTest()) {
            RefactorMigrationTable::clear('2024_05_20_000001_create_test_files_table');
            RefactorMigrationTable::clear('2024_05_20_000002_create_headers_table');
            RefactorMigrationTable::clear('2024_05_20_000003_create_modals_table');
            RefactorMigrationTable::clear('2024_05_20_000004_create_actions_table');
            RefactorMigrationTable::clear('2024_05_20_000005_create_test_operations_table');
            RefactorMigrationTable::clear('2024_05_20_000006_create_test_reviews_table');
            RefactorMigrationTable::clear('2024_05_21_000007_create_test_images_table');
            RefactorMigrationTable::clear('2024_05_31_000008_create_codes_table');

        }
    }
}

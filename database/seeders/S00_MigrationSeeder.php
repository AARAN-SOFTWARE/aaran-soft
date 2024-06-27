<?php

namespace Database\Seeders;

use Aaran\Aadmin\Database\Migrations\RefactorMigrationTable;
use Aaran\Aadmin\Src\DbMigration;
use Illuminate\Database\Seeder;

class S00_MigrationSeeder extends Seeder
{
    public static function run(): void
    {

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

        if (!DbMigration::hasCommon()) {
            RefactorMigrationTable::clear('2024_03_01_000101_create_cities_table');
            RefactorMigrationTable::clear('2024_03_01_000102_create_states_table');
            RefactorMigrationTable::clear('2024_03_01_000103_create_pincodes_table');
            RefactorMigrationTable::clear('2024_03_01_000104_create_countries_table');
            RefactorMigrationTable::clear('2024_03_01_000105_create_hsncodes_table');
            RefactorMigrationTable::clear('2024_03_01_000106_create_categories_table');
            RefactorMigrationTable::clear('2024_03_01_000107_create_colours_table');
            RefactorMigrationTable::clear('2024_03_01_000108_create_sizes_table');
            RefactorMigrationTable::clear('2024_03_01_000109_create_departments_table');
            RefactorMigrationTable::clear('2024_03_01_000110_create_ledgers_table');
            RefactorMigrationTable::clear('2024_03_01_000111_create_transports_table');
            RefactorMigrationTable::clear('2024_03_01_000112_create_bank_table');
            RefactorMigrationTable::clear('2024_03_01_000113_create_receipttypes_table');
            RefactorMigrationTable::clear('2024_03_01_000114_create_despatches_table');
        }

        if (!DbMigration::hasMaster()) {
            RefactorMigrationTable::clear('2024_03_01_000201_create_companies_table');
            RefactorMigrationTable::clear('2024_03_01_000202_create_contacts_table');
            RefactorMigrationTable::clear('2024_03_01_000203_create_contact_details_table');
            RefactorMigrationTable::clear('2024_03_01_000204_create_products_table');
        }

        if (!DbMigration::hasOrder()) {
            RefactorMigrationTable::clear('2024_03_01_000205_create_orders_table');
        }

        if (!DbMigration::hasStyle()) {
            RefactorMigrationTable::clear('2024_03_01_000206_create_styles_table');
        }

        if (!DbMigration::hasEntry()) {
            RefactorMigrationTable::clear('2024_03_01_000301_create_sales_table');
            RefactorMigrationTable::clear('2024_03_01_000302_create_saleitems_table');
            RefactorMigrationTable::clear('2024_03_01_000303_create_purchases_table');
            RefactorMigrationTable::clear('2024_03_01_000304_create_purchaseitems_table');
            RefactorMigrationTable::clear('2024_03_01_000305_create_receipts_table');
            RefactorMigrationTable::clear('2024_03_01_000306_create_payments_table');
        }

        if (!DbMigration::hasCreditNote()) {
            RefactorMigrationTable::clear('2024_03_01_000307_create_credit_notes_table');
            RefactorMigrationTable::clear('2024_03_01_000308_create_credit_noteitems_table');
        }

        if (!DbMigration::hasDebitNote()) {
            RefactorMigrationTable::clear('2024_03_01_000309_create_debit_notes_table');
            RefactorMigrationTable::clear('2024_03_01_000310_create_debit_noteitems_table');
        }

        if (!DbMigration::hasCashBook()) {
            RefactorMigrationTable::clear('2024_03_01_000601_create_cashbooks_table');
        }
        if (!DbMigration::hasBankBook()) {
            RefactorMigrationTable::clear('2024_03_01_000602_create_bankbooks_table');
        }

        if (!DbMigration::hasAttendance()) {
            RefactorMigrationTable::clear('2024_03_01_001301_create_attendances_table');
        }

        if (!DbMigration::hasAudit()) {
            RefactorMigrationTable::clear('2024_03_01_000401_create_clients_table');
            RefactorMigrationTable::clear('2024_03_01_000402_create_client_details_table');
            RefactorMigrationTable::clear('2024_03_01_000403_create_client_fees_table');
            RefactorMigrationTable::clear('2024_03_01_000405_create_client_gst_filings_table');
            RefactorMigrationTable::clear('2024_03_01_000406_create_client_banks_table');
            RefactorMigrationTable::clear('2024_03_01_000407_create_client_bank_balances_table');
            RefactorMigrationTable::clear('2024_03_01_000408_create_payment_slips_table');
            RefactorMigrationTable::clear('2024_03_01_000408_create_turnovers_table');
            RefactorMigrationTable::clear('2024_03_01_000409_create_gst_credits_table');
            RefactorMigrationTable::clear('2024_03_01_000409_create_vehicles_table');
            RefactorMigrationTable::clear('2024_03_01_000410_create_rootline_table');
            RefactorMigrationTable::clear('2024_03_01_000411_create_rootline_items_table');
            RefactorMigrationTable::clear('2024_03_01_000412_create_sales_tracks_table');
            RefactorMigrationTable::clear('2024_03_01_000413_create_sales_track_items_table');
            RefactorMigrationTable::clear('2024_03_01_000414_create_sales_bills_table');
            RefactorMigrationTable::clear('2024_03_01_000415_create_sales_bill_items_table');
            RefactorMigrationTable::clear('2024_03_01_000418_create_track_reports_table');
            RefactorMigrationTable::clear('2024_05_01_000417_create_discourses_table');
        }

        if (!DbMigration::hasBlog()) {
            RefactorMigrationTable::clear('2024_03_01_001200_create_posts_table');
            RefactorMigrationTable::clear('2024_04_29_101022_create_images_table');
        }

        if (!DbMigration::hasTaskManager()) {
            RefactorMigrationTable::clear('2024_03_01_000501_create_tasks_table');
            RefactorMigrationTable::clear('2024_03_01_000502_create_replies_table');
            RefactorMigrationTable::clear('2024_03_01_000503_create_activities_table');
            RefactorMigrationTable::clear('2024_03_01_000504_create_notice_boards_table');
        }

        if (!DbMigration::hasTodoList()) {
            RefactorMigrationTable::clear('2024_03_01_000505_create_todos_table');
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

        if (!DbMigration::hasMagalir()) {
            RefactorMigrationTable::clear('2024_05_06_001401_create_mg_clubs_table');
            RefactorMigrationTable::clear('2024_05_06_001402_create_mg_members_table');
            RefactorMigrationTable::clear('2024_05_06_001403_create_mg_loans_table');
            RefactorMigrationTable::clear('2024_05_06_001404_create_mg_passbooks_table');
        }

        if (!DbMigration::hasDeveloper()) {
            RefactorMigrationTable::clear('2024_03_01_001100_create_demo_requests_table');
            RefactorMigrationTable::clear('2024_04_01_001101_create_software_details_table');
            RefactorMigrationTable::clear('2024_04_01_001103_create_project_tasks_table');
            RefactorMigrationTable::clear('2024_04_01_001105_create_project_replies_table');
            RefactorMigrationTable::clear('2024_05_11_001109_create_surfing_categories_table');
            RefactorMigrationTable::clear('2024_05_11_001110_create_surfings_table');
            RefactorMigrationTable::clear('2024_05_13_001111_create_surfing_replies_table');
            RefactorMigrationTable::clear('2024_05_20_001112_create_ui_tasks_table');
            RefactorMigrationTable::clear('2024_05_20_001113_create_ui_replies_table');

            RefactorMigrationTable::clear('2024_05_24_000601_create_headers_table');
            RefactorMigrationTable::clear('2024_05_24_000602_create_modals_table');
            RefactorMigrationTable::clear('2024_05_24_000603_create_test_cases_table');
            RefactorMigrationTable::clear('2024_06_24_000604_create_test_modules_table');
            RefactorMigrationTable::clear('2024_06_24_000605_create_test_files_table');
            RefactorMigrationTable::clear('2024_06_24_000606_create_model_tests_table');
            RefactorMigrationTable::clear('2024_06_24_000607_create_db_tests_table');
            RefactorMigrationTable::clear('2024_06_24_000608_create_table_names_table');
            RefactorMigrationTable::clear('2024_06_24_000609_create_migration_tables_table');
            RefactorMigrationTable::clear('2024_06_24_000610_create_admin_tests_table');
            RefactorMigrationTable::clear('2024_06_24_000611_create_sw_tests_table');
            RefactorMigrationTable::clear('2024_06_24_000612_create_lw_class_tests_table');
            RefactorMigrationTable::clear('2024_06_24_000613_create_lw_blade_tests_table');
            RefactorMigrationTable::clear('2024_06_24_000614_create_menu_tests_table');
            RefactorMigrationTable::clear('2024_06_24_000615_create_test_images_table');
        }

        if (!DbMigration::hasCreditBooks()) {
            RefactorMigrationTable::clear('2024_03_01_001001_create_credit_members_table');
            RefactorMigrationTable::clear('2024_03_01_001002_create_credit_books_table');
            RefactorMigrationTable::clear('2024_03_01_001003_create_credit_book_items_table');
            RefactorMigrationTable::clear('2024_03_01_001003_create_credit_interests_table');
            RefactorMigrationTable::clear('2024_03_01_001004_create_credit_summaries_table');
        }
        if (!DbMigration::hasMailids()) {
            RefactorMigrationTable::clear('2024_03_01_001005_create_mailids_table');
        }

        if (!DbMigration::hasShareTrades()) {
            RefactorMigrationTable::clear('2024_03_01_001006_create_share_trades_table');
            RefactorMigrationTable::clear('2024_03_01_001006_create_stock_trades_table');
        }
    }
}

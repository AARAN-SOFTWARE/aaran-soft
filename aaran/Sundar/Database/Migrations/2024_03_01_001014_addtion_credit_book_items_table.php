<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasCreditBooks()) {

            Schema::table('credit_book_items', function (Blueprint $table) {
                $table->string('due_date')
                    ->after('interest')
                    ->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('credit_book_items', function (Blueprint $table) {
            $table->dropColumn('interest');
        });
    }
};

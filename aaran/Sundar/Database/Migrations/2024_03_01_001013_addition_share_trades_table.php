<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasShareMarket()) {

            Schema::table('share_trades', function (Blueprint $table) {
                $table->decimal('invested')
                    ->after('vdate')->default('0')
                    ->nullable();

                $table->decimal('drawings')
                    ->after('invested')->default('0')
                    ->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('share_trades', function (Blueprint $table) {
            $table->dropColumn('drawings');
            $table->dropColumn('invested');
        });
    }
};

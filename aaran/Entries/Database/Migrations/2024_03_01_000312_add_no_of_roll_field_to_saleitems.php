<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Aaran\Aadmin\Src\DbMigration::hasCurrentVersion()) {
            Schema::table('saleitems', function (Blueprint $table) {
                $table->string('no_of_roll')->nullable()->after('dc_no');
            });
        }
    }

    public function down(): void
    {
        Schema::table('saleitems', function (Blueprint $table) {
            $table->dropColumn('no_of_roll');
        });
    }
};

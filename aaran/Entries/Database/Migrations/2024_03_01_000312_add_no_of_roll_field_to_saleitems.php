<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('saleitems', function (Blueprint $table) {
            $table->string('no_of_roll')->nullable()->after('dc_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('saleitems', function (Blueprint $table) {
            $table->dropColumn('no_of_roll');
        });
    }
};

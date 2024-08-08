<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasShareMarket()) {

            Schema::create('spot_names', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->nullable();
                $table->smallInteger('active_id')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('spot_names');
    }
};

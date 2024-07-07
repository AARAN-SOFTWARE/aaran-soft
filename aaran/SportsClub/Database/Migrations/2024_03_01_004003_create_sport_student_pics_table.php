<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSportsClub()) {

            Schema::create('sport_master_pics', function (Blueprint $table) {
                $table->id();
                $table->foreignId('sport_master_id')->references('id')->on('sport_masters');
                $table->string('pic_name')->nullable();
                $table->string('desc')->nullable();
                $table->string('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('spot_pics');
    }
};

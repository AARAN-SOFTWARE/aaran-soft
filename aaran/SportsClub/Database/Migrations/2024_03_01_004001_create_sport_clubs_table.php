<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSportsClub()) {

            Schema::create('sport_clubs', function (Blueprint $table) {
                $table->id();
                $table->string('vname');
                $table->string('master_name')->nullable();
                $table->string('mobile')->nullable();
                $table->string('whatsapp')->nullable();
                $table->string('email')->nullable();
                $table->string('address_1')->nullable();
                $table->string('address_2')->nullable();
                $table->foreignId('city_id')->references('id')->on('cities');
                $table->foreignId('state_id')->references('id')->on('states');
                $table->foreignId('pincode_id')->references('id')->on('pincodes');
                $table->string('started_at')->nullable();
                $table->string('club_photo')->nullable();
                $table->string('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('sport_clubs');
    }
};

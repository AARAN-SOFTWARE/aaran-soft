<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSports()) {

            Schema::create('sport_activities', function (Blueprint $table) {
                $table->id();
                $table->string('vname');
                $table->longText('image')->nullable();
                $table->string('active_id', 3)->nullable();
                $table->foreignId('sport_club_id')->references('id')->on('sport_clubs');
                $table->foreignId('tenant_id')->references('id')->on('tenants');
                $table->foreignId('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }


    public function down(): void
    {
        Schema::dropIfExists('sport_activities');
    }
};

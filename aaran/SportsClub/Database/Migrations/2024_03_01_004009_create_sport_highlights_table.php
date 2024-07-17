<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('sport_highlights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->references('id')->on('sport_activities')->onDelete('cascade');
            $table->string('vname');
            $table->longText('url')->nullable();
            $table->string('active_id', 3)->nullable();
            $table->foreignId('sport_club_id')->references('id')->on('sport_clubs');
            $table->foreignId('tenant_id')->references('id')->on('tenants');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('sport_highlights');
    }
};

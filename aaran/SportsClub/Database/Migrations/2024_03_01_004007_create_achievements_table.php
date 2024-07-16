<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('vname');
            $table->longText('desc');
            $table->longText('image')->nullable();
            $table->string('category')->nullable();
            $table->string('date')->nullable();
            $table->string('location')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('active_id', 3)->nullable();
            $table->foreignId('sport_club_id')->references('id')->on('sport_clubs');
            $table->foreignId('tenant_id')->references('id')->on('tenants');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achivements');
    }
};

<?php

namespace Aaran\Finance\Magalir\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mg_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mg_club_id')->references('id')->on('mg_clubs');
            $table->string('photo')->nullable();

            $table->string('vname');
            $table->string('father');
            $table->string('mother');

            $table->date('dob')->nullable();
            $table->string('aadhaar')->nullable();
            $table->string('pan')->nullable();

            $table->string('mobile')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('email')->nullable();

            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('state_id')->references('id')->on('states');
            $table->foreignId('pincode_id')->references('id')->on('pincodes');

            $table->string('nominee')->nullable();
            $table->string('n_mobile')->nullable();
            $table->string('n_aadhaar')->nullable();

            $table->string('active_id', 3)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');

            $table->timestamps();
//            $table->unique(['vname', 'father', 'mother','aadhaar']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mg_members');
    }
};

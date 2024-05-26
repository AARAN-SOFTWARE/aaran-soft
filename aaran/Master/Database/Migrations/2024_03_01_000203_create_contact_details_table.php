<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->string('address_type')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('state_id')->references('id')->on('states');
            $table->foreignId('pincode_id')->references('id')->on('pincodes');
            $table->foreignId('country_id')->references('id')->on('countries');
            $table->string('gstin')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('contact_details');
    }
};

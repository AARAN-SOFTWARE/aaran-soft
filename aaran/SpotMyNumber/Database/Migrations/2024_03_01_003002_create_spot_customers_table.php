<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSpotMyNumber()) {

            Schema::create('spot_customers', function (Blueprint $table) {
                $table->id();
                $table->string('vname');
                $table->string('contact_person')->nullable();
                $table->string('mobile')->nullable();
                $table->string('whatsapp')->nullable();
                $table->string('email')->nullable();
                $table->string('website')->nullable();
                $table->string('gstin')->nullable();
                $table->string('address_1')->nullable();
                $table->string('address_2')->nullable();
                $table->string('landmark')->nullable();
                $table->foreignId('city_id')->references('id')->on('cities');
                $table->foreignId('state_id')->references('id')->on('states');
                $table->foreignId('pincode_id')->references('id')->on('pincodes');
                $table->foreignId('country_id')->references('id')->on('countries');
                $table->string('geoLocation')->nullable();
                $table->string('working_days')->nullable();
                $table->string('business_open_timing')->nullable();
                $table->string('business_close_timing')->nullable();
                $table->string('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('spot_customers');
    }
};

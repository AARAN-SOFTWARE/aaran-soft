<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSpotMyNumber()) {
            Schema::create('spot_categories', function (Blueprint $table) {
                $table->id();
                $table->foreignId('spot_customer_id')->references('id')->on('spot_customers')->onDelete('cascade');
                $table->foreignId('spot_category_id')->references('id')->on('spot_listings');
                $table->string('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }


    public function down(): void
    {
        Schema::dropIfExists('spot_categories');
    }
};

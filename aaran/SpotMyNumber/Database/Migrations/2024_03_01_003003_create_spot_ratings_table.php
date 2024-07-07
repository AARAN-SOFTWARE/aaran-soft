<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSpotMyNumber()) {

            Schema::create('spot_ratings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('spot_customer_id')->references('id')->on('spot_customers');
                $table->string('category')->nullable();
                $table->string('sub_category')->nullable();
                $table->string('star')->nullable();
                $table->string('rating')->nullable();
                $table->string('badge')->nullable();
                $table->string('views')->nullable();
                $table->string('likes')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('spot_ratings');
    }
};

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
                $table->foreignId('category_id')->references('id')->on('spot_listings');
                $table->foreignId('star_id')->references('id')->on('spot_listings');
                $table->foreignId('rating_id')->references('id')->on('spot_listings');
                $table->foreignId('badge_id')->references('id')->on('spot_listings');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surfings', function (Blueprint $table) {
            $table->id();
            $table->string('vname')->unique();
            $table->string('webpage')->nullable();
            $table->foreignId('surfing_category_id')->references('id')->on('surfing_categories');
            $table->smallInteger('active_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surfings');
    }
};

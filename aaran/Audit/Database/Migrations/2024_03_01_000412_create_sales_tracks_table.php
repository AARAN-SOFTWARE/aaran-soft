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
        Schema::create('sales_tracks', function (Blueprint $table) {
            $table->id();
            $table->date('vdate')->nullable();
            $table->foreignId('smonth_id')->references('id')->on('smonths');
            $table->foreignId('sales_track_id')->references('id')->on('sales_tracks');
            $table->string('active_id',3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_tracks');
    }
};

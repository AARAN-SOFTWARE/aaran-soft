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
        Schema::create('sales_track_items', function (Blueprint $table) {
            $table->id();
            $table->string('serial')->nullable();
            $table->foreignId('sales_track_id')->references('id')->on('sales_tracks');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->integer('total_count')->nullable();
            $table->decimal('total_value',13,2)->nullable();
            $table->smallInteger('status')->nullable();
            $table->smallInteger('active_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_track_items');
    }
};

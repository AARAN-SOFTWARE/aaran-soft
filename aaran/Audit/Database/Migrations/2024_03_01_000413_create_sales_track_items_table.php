<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales_track_items', function (Blueprint $table) {
            $table->id();
            $table->string('serial')->nullable();
            $table->date('vdate')->nullable();
            $table->foreignId('track_id')->references('id')->on('tracks');
            $table->foreignId('sales_track_id')->references('id')->on('sales_tracks');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->smallInteger('status')->nullable();
            $table->smallInteger('active_id')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_track_items');
    }
};

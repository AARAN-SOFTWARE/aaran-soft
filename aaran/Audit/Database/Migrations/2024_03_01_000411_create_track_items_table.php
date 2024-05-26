<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('track_items', function (Blueprint $table) {
            $table->id();
            $table->string('serial')->nullable();
            $table->foreignId('track_id')->references('id')->on('tracks');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->integer('total_count')->nullable();
            $table->decimal('total_value',13,2)->nullable();
            $table->smallInteger('status')->nullable();
            $table->smallInteger('active_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('track_items');
    }
};

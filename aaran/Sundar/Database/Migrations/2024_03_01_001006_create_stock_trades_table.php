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
        Schema::create('stock_trades', function (Blueprint $table) {
            $table->id();
            $table->integer('serial')->nullable();
            $table->string('vdate')->nullable();
            $table->string('trade_type')->nullable();
            $table->string('stock_name')->nullable();
            $table->string('option_type')->nullable();
            $table->decimal('buy', 15, 2)->nullable();
            $table->decimal('sell', 15, 2)->nullable();
            $table->decimal('spread', 15, 2)->nullable();
            $table->decimal('shares', 15, 2)->nullable();
            $table->decimal('profit', 15, 2)->nullable();
            $table->decimal('commission', 15, 2)->nullable();
            $table->foreignId('share_trade_id')->references('id')->on('share_trades')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->decimal('active_id',3)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_trades');
    }
};

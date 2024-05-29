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
        Schema::create('sales_bills', function (Blueprint $table) {
            $table->id();
            $table->integer('serial')->nullable();
            $table->foreignId('rootline_id')->references('id')->on('rootlines')->cascadeOnDelete();
            $table->foreignId('sales_track_item_id')->references('id')->on('sales_track_items');

            $table->string('vno')->nullable();
            $table->date('vdate')->nullable();
            $table->foreignId('sales_from')->references('id')->on('clients');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->string('bundle')->nullable();
            $table->foreignId('ledger_id')->nullable();
            $table->decimal('additional', 11, 2)->nullable();
            $table->string('total_qty')->nullable();
            $table->decimal('taxable')->nullable();
            $table->decimal('gst')->nullable();
            $table->string('round_off')->nullable();
            $table->decimal('grand_total')->nullable();
            $table->foreignId('vehicle_id')->references('id')->on('vehicles');
            $table->decimal('status')->nullable();
            $table->smallInteger('active_id')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_bills');
    }
};

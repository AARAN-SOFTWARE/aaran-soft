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
        Schema::create('share_trades', function (Blueprint $table) {
            $table->id();
            $table->string('vdate')->nullable();
            $table->decimal('opening_balance')->nullable();
            $table->decimal('deposit',10,3)->nullable();
            $table->decimal('loosed',10,3)->nullable();
            $table->decimal('withdraw',10,3)->nullable();
            $table->decimal('charges',10,3)->nullable();
            $table->decimal('balance',10,3)->nullable();
            $table->string('remarks')->nullable();
            $table->decimal('active_id',3)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_trades');
    }
};

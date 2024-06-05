<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('share_trades', function (Blueprint $table) {
            $table->id();
            $table->string('vdate')->nullable();
            $table->decimal('opening_balance')->nullable();
            $table->decimal('deposit',13,2)->nullable();
            $table->decimal('profit',13,2)->nullable();
            $table->decimal('loosed',13,2)->nullable();
            $table->decimal('withdraw',13,2)->nullable();
            $table->decimal('charges',13,2)->nullable();
            $table->decimal('balance',13,2)->nullable();
            $table->string('remarks')->nullable();
            $table->smallInteger('active_id')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('share_trades');
    }
};

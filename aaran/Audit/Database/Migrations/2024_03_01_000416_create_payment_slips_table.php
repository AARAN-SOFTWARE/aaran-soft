<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_slips', function (Blueprint $table) {
            $table->id();
            $table->string('slip_no')->nullable();
            $table->string('group')->nullable();
            $table->foreignId('sender_id')->nullable();
            $table->foreignId('receiver_id')->nullable();
            $table->string('due')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('paid')->nullable();
            $table->string('paidOn')->nullable();
            $table->string('status')->nullable();
            $table->string('active_id',10)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_slips');
    }
};

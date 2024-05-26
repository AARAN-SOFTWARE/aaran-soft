<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_bank_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_bank_id')->references('id')->on('client_banks')->onDelete('cascade');
            $table->date('cdate');
            $table->decimal('balance');
            $table->foreignId('user_id')->references('id')->on('users');
//            $table->foreignId('company_id')->references('id')->on('companies');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_bank_balances');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interest_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credit_book_id')->references('id')->on('credit_books');
            $table->date('vdate');
            $table->decimal('interest',11,2);
            $table->decimal('received',11,2);
            $table->date('received_date');
            $table->string('remarks');
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interest_books');
    }
};

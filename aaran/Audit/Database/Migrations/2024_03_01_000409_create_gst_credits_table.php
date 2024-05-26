<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gstcredits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('month');
            $table->string('year');
            $table->decimal('opening_igst',13,2)->nullable();
            $table->decimal('opening_cgst',13,2)->nullable();
            $table->decimal('opening_sgst',13,2)->nullable();
            $table->decimal('sales_igst',13,2)->nullable();
            $table->decimal('sales_cgst',13,2)->nullable();
            $table->decimal('sales_sgst',13,2)->nullable();
            $table->decimal('purchase_igst',13,2)->nullable();
            $table->decimal('purchase_cgst',13,2)->nullable();
            $table->decimal('purchase_sgst',13,2)->nullable();
            $table->string('remarks')->nullable();
//            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gstcredits');
    }
};

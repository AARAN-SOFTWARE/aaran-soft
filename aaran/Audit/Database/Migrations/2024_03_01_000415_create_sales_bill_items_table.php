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
        Schema::create('sales_bill_items', function (Blueprint $table) {
            $table->id();
            $table->integer('serial')->nullable();
            $table->foreignId('sales_bill_id')->references('id')->on('sales_bills');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->string('description')->nullable();
            $table->foreignId('colour_id')->references('id')->on('colours');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->decimal('qty',13,3);
            $table->decimal('price');
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
        Schema::dropIfExists('sales_bill_items');
    }
};

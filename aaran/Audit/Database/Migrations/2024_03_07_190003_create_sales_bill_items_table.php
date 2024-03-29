<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales_track_bill_items', function (Blueprint $table) {
            $table->id();
            $table->integer('serial');
            $table->foreignId('sales_track_bill_id')->references('id')->on('sales_track_bills');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('colour_id')->references('id')->on('colours');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->decimal('qty',13,3);
            $table->decimal('price');
            $table->string('active_id',10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_track_bill_items');
    }
};

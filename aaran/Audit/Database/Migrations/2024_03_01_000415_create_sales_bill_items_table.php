<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasAudit()) {

            Schema::create('sales_bill_items', function (Blueprint $table) {
                $table->id();
                $table->integer('serial')->nullable();
                $table->foreignId('sales_track_bill_id')->references('id')->on('sales_bills');
                $table->foreignId('category_id')->references('id')->on('categories');
                $table->foreignId('product_id')->references('id')->on('products');
                $table->string('description')->nullable();
                $table->foreignId('colour_id')->references('id')->on('colours');
                $table->foreignId('size_id')->references('id')->on('sizes');
                $table->decimal('qty', 13, 3);
                $table->decimal('price');
                $table->smallInteger('active_id')->nullable();
                $table->foreignId('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_bill_items');
    }
};

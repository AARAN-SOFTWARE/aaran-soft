<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDemo()) {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('vname')->unique();
            $table->string('product_type')->nullable();
            $table->foreignId('hsncode_id')->references('id')->on('hsncodes');
            $table->string('units')->nullable();
            $table->string('gst_percent')->nullable();
            $table->string('active_id', 3)->nullable();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }}

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

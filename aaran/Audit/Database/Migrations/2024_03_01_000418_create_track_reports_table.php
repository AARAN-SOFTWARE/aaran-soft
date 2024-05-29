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
        Schema::create('track_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_bill_id')->references('id')->on('sales_bills')->onDelete('cascade');
            $table->string('unique_no')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('checked')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('track_reports');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDemo()) {
        Schema::create('sales_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('vcode')->nullable();
            $table->date('vdate')->nullable();
            $table->foreignId('rootline_id')->references('id')->on('rootlines');
            $table->string('active_id',3)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_tracks');
    }
};

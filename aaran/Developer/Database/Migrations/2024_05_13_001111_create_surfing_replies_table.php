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
        if (Aaran\Aadmin\Src\DbMigration::hasDemo()) {
        Schema::create('surfing_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surfing_id')->references('id')->on('surfings')->onDelete('cascade');
            $table->longText('vname');
            $table->string('verified')->nullable();
            $table->string('verified_on')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surfing_replies');
    }
};

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
        Schema::create('modals', function (Blueprint $table) {
            $table->id();
            $table->string('vname')->nullable();
            $table->foreignId('header_id')->references('id')->on('headers')->onDelete('cascade');
            $table->smallInteger('active_id')->nullable();
            $table->timestamps();
        });

    }}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modals');
    }
};

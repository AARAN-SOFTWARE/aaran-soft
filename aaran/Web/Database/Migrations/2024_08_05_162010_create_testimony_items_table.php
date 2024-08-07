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
        if (Aaran\Aadmin\Src\DbMigration::hasWebs()) {
            Schema::create('testimony_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('testimony_id')->references('id')->on('testimonies')->onDelete('cascade');
                $table->longText('icon')->nullable();
                $table->string('title')->nullable();
                $table->longText('description')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimony_items');
    }
};

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

            Schema::create('testimonies', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->unique();
                $table->longText('description')->nullable();
                $table->longText('image')->nullable();
                $table->string('active_id')->nullable();
                $table->foreignId('user_id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonies');
    }
};

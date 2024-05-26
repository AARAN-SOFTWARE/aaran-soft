<?php

namespace Aaran\Sundar\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mailids', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('email_id')->nullable();
            $table->string('vname')->nullable();
            $table->string('password');
            $table->smallInteger('active_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mailids');
    }
};

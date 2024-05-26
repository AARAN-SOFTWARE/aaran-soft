<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->integer('slno')->nullable();
            $table->string('vdate')->nullable();
            $table->string('vname')->nullable();
            $table->string('completed')->nullable();
            $table->string('subjective')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('active_id', 3)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};

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
        Schema::create('test_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actions_id')->nullable();
            $table->foreignId('modals_id')->nullable();
            $table->date('vdate');
            $table->string('vname')->nullable();
            $table->longText('body');
            $table->foreignId('assignee')->references('id')->on('users')->onDelete('cascade');
            $table->string('status',3)->nullable();
            $table->boolean('verified')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('active_id', 3)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_operations');
    }
};

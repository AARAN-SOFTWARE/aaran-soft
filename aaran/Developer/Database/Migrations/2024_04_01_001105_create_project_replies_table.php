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
        Schema::create('project_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_task_id')->references('id')->on('project_tasks')->onDelete('cascade');
            $table->text('vname');
            $table->string('verified')->nullable();
            $table->string('verified_on')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_replies');
    }
};

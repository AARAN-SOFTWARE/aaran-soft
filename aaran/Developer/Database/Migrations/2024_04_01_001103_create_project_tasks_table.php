<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('body')->nullable();
            $table->string('channel')->nullable();
            $table->foreignId('allocated')->references('id')->on('users');
            $table->string('priority')->nullable();
            $table->string('status', 3)->nullable();
            $table->string('verified')->nullable();
            $table->string('verified_on')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('active_id',10)->nullable();
            $table->longText('task_pic')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_tasks');
    }
};

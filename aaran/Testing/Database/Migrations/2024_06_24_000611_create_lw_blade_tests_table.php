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
        Schema::create('lw_blade_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->references('id')->on('test_modules')->onDelete('cascade');
            $table->foreignId('class_id')->references('id')->on('lw_class_tests')->onDelete('cascade');
            $table->string('vname');
            $table->boolean('checked_1');
            $table->boolean('checked_2');
            $table->boolean('checked_3');
            $table->boolean('checked_4');
            $table->boolean('checked_5');
            $table->boolean('checked_6');
            $table->boolean('checked_7');
            $table->boolean('checked_8');
            $table->boolean('checked_9');
            $table->boolean('checked_10');
            $table->boolean('checked_11');
            $table->boolean('checked_12');
            $table->longText('description');
            $table->longText('comment');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->smallInteger('active_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lw_blade_tests');
    }
};

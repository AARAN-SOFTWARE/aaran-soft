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
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloperTesting()) {

            Schema::create('model_tests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('module_id')->references('id')->on('test_modules')->onDelete('cascade');
                $table->string('vname');
                $table->boolean('checked_1');
                $table->boolean('checked_2');
                $table->boolean('checked_3');
                $table->string('eloquent');
                $table->longText('description');
                $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->smallInteger('active_id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_tests');
    }
};

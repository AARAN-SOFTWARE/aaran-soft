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

            Schema::create('db_tests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('module_id')->references('id')->on('test_modules')->onDelete('cascade');
                $table->foreignId('model_id')->references('id')->on('model_tests')->onDelete('cascade');
                $table->string('vname');
                $table->longText('table_name');
                $table->longText('description');
                $table->string('foreign_id');
                $table->boolean('checked_1');
                $table->boolean('checked_2');
                $table->boolean('checked_3');
                $table->boolean('checked_4');
                $table->boolean('checked_5');
                $table->longText('comment');
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
        Schema::dropIfExists('db_tests');
    }
};

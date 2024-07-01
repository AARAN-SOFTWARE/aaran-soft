<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloperTesting()) {

            Schema::create('lw_blade_tests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('module_id')->references('id')->on('test_modules')->onDelete('cascade');
                $table->foreignId('class_id')->references('id')->on('lw_class_tests')->onDelete('cascade');
                $table->string('vname');
                $table->string('blade_file');
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
                $table->boolean('checked_13');
                $table->longText('description');
                $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->smallInteger('active_id');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('lw_blade_tests');
    }
};

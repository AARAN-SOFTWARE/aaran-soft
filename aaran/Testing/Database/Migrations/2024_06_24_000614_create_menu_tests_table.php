<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloperTesting()) {

            Schema::create('menu_tests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('module_id')->references('id')->on('test_modules')->onDelete('cascade');
                $table->foreignId('blade_id')->references('id')->on('lw_blade_tests')->onDelete('cascade');
                $table->string('vname');
                $table->string('menu');
                $table->boolean('checked');
                $table->longText('comment');
                $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->smallInteger('active_id');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_tests');
    }
};

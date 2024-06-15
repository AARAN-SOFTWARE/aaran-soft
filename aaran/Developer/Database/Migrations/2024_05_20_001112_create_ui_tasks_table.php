<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloper()) {

            Schema::create('ui_tasks', function (Blueprint $table) {
                $table->id();
                $table->string('vname');
                $table->string('vdate');
                $table->longText('body');
                $table->foreignId('allocated')->references('id')->on('users');
                $table->string('status')->nullable();
                $table->string('priority')->nullable();
                $table->string('verify')->nullable();
                $table->foreignId('user_id')->references('id')->on('users');
                $table->string('active_id')->nullable();
                $table->longText('ui_pic')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('ui_tasks');
    }
};

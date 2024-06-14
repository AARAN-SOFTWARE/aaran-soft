<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDemo()) {
        Schema::create('ui_replies', function (Blueprint $table) {
            $table->id();
            $table->string('vname');
//            $table->primary('ui_replies_id');
            $table->longText('image')->nullable();
            $table->string('verified')->nullable();
            $table->string('verified_on')->nullable();
            $table->foreignId('ui_task_id')->references('id')->on('ui_tasks');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }}


    public function down(): void
    {
        Schema::dropIfExists('ui_replies');
    }
};

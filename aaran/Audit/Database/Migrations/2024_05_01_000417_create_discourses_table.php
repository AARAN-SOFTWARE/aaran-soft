<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasAudit()) {

        Schema::create('discourses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->date('vdate');
            $table->string('title');
            $table->longText('body')->nullable();
            $table->string('channel')->nullable();
            $table->foreignId('allocated')->references('id')->on('users')->onDelete('cascade');
            $table->string('priority')->nullable();
            $table->longText('image')->nullable();
            $table->string('verified')->nullable();
            $table->string('verified_on')->nullable();
            $table->string('status')->nullable();
            $table->smallInteger('editable')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('active_id')->nullable();
            $table->timestamps();
        });

        Schema::create('discourse_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discourse_id')->references('id')->on('discourses')->onDelete('cascade');
            $table->text('vname');
            $table->string('verified')->nullable();
            $table->string('verified_on')->nullable();
            $table->smallInteger('editable')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    }

    public function down(): void
    {
        Schema::dropIfExists('discourse_replies');
        Schema::dropIfExists('discourses');
    }
};

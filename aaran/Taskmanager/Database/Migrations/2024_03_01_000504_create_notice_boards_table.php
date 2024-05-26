<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notice_boards', function (Blueprint $table) {
            $table->id();
            $table->date('cdate');
            $table->string('client_id')->nullable();
            $table->text('vname');
            $table->text('remarks')->nullable();
            $table->string('verified')->nullable();
            $table->string('verified_on')->nullable();
            $table->string('active_id',3)->nullable();
            $table->string('priority')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notice_boards');
    }
};

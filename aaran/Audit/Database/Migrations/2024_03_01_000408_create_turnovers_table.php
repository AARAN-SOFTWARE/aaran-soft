<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('turnovers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('month');
            $table->string('year');
            $table->decimal('target',13,2)->nullable();
            $table->decimal('achieved',13,2)->nullable();
            $table->string('remarks')->nullable();
            $table->string('status_id', 3)->nullable();
//            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turnovers');
    }
};

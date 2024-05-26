<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('vname');
            $table->string('mobile')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_type')->nullable();
            $table->string('msme_no')->nullable();
            $table->string('msme_type')->nullable();
            $table->decimal('opening_balance')->nullable();
            $table->string('effective_from')->nullable();
            $table->string('active_id', 3)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->timestamps();
            $table->unique(['vname', 'mobile']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

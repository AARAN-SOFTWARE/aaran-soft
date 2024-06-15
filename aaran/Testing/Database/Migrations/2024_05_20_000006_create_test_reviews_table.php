<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasTest()) {

            Schema::create('test_reviews', function (Blueprint $table) {
                $table->id();
                $table->foreignId('operations_id')->references('id')->on('test_operations')->onDelete('cascade');
                $table->string('vname')->nullable();
                $table->string('verified')->nullable();
                $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('test_reviews');
    }
};

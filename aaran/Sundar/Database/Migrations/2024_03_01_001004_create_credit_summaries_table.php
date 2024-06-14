<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasCreditBooks()) {

            Schema::create('credit_summaries', function (Blueprint $table) {
                $table->id();
                $table->string('header');
                $table->decimal('interest', 11, 2);
                $table->decimal('pending', 11, 2);
                $table->string('remarks');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_summaries');
    }
};

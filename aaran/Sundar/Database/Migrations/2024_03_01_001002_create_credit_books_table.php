<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasCreditBooks()) {

            Schema::create('credit_books', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->unique();
                $table->decimal('closing', 11, 2);
                $table->string('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_books');
    }
};

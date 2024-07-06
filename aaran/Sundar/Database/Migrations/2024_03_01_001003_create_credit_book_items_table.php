<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasCreditBooks()) {

            Schema::create('credit_book_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('credit_book_id')->references('id')->on('credit_books');
                $table->decimal('loan', 11, 2);
                $table->decimal('rate', 11, 2);
                $table->decimal('processing', 11, 2);
                $table->decimal('commission', 11, 2);
                $table->decimal('credited', 11, 2);
                $table->date('vdate');
                $table->decimal('emi', 11, 2);
                $table->integer('terms')->nullable();
                $table->string('pending_due')->nullable();
                $table->decimal('pending', 11, 2);
                $table->string('remarks')->nullable();
                $table->string('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_book_items');
    }
};

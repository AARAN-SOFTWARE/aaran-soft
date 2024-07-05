<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasWelfare()) {

            Schema::create('project_estimations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('project_id')->references('id')->on('projects')->cascadeOnDelete();
                $table->foreignId('project_product_id')->references('id')->on('project_products')->cascadeOnDelete();
                $table->decimal('qty', 15, 3);
                $table->decimal('rate', 15, 2);
                $table->decimal('amount', 15, 2);
                $table->string('active_id', 3)->nullable();
                $table->foreignId('entry_id')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('project_estimations');
    }
};

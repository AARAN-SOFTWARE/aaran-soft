<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloper()) {
            Schema::create('task_reviews', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->nullable();
                $table->string('assign_to')->nullable();
                $table->string('status', 3)->nullable();
                $table->smallInteger('active_id');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('task_reviews');
    }
};

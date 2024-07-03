<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasWelfare()) {

            Schema::create('project_shares', function (Blueprint $table) {
                $table->id();
                $table->foreignId('projects_id')->references('id')->on('projects')->cascadeOnDelete();
                $table->decimal('estimated', 15, 3);
                $table->decimal('face_value', 15, 3);
                $table->integer('volume');
                $table->decimal('current_value', 15, 3);
                $table->decimal('margin', 15, 3);
                $table->decimal('dividend', 15, 2);
                $table->string('active_id', 3)->nullable();
                $table->foreignId('entry_id')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('project_shares');
    }
};

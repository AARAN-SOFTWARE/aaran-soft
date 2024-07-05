<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasWelfare()) {

            Schema::create('project_trades', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
                $table->foreignId('project_id')->references('id')->on('projects')->cascadeOnDelete();
                $table->integer('no_of_shares');
                $table->string('active_id', 3)->nullable();
                $table->foreignId('entry_id')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('project_trades');
    }
};

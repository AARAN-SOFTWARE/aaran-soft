<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloper()) {

        Schema::create('review_file_names', function (Blueprint $table) {
            $table->id();
            $table->string('vname')->unique();
            $table->smallInteger('active_id');
            $table->timestamps();
        });
    }
    }

    public function down(): void
    {
        Schema::dropIfExists('review_file_names');
    }
};

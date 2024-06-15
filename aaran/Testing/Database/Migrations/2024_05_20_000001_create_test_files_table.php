<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasTest()) {

            Schema::create('test_files', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->nullable();
                $table->smallInteger('active_id')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('test_files');
    }
};

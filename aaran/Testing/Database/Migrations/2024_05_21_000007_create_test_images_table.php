<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloper()) {
            Schema::create('test_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('operations_id')->references('id')->on('test_operations')->onDelete('cascade');
                $table->longText('image');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('test_images');
    }
};

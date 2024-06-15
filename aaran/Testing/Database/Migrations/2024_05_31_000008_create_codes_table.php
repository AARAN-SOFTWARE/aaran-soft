<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasTest()) {

            Schema::create('codes', function (Blueprint $table) {
                $table->id();
                $table->longText('content');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('codes');
    }
};

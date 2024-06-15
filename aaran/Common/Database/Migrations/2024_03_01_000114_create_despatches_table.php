<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDespatch()) {

            Schema::create('despatches', function (Blueprint $table) {
                $table->id();
                $table->string('vname');
                $table->string('vdate')->nullable();
                $table->smallInteger('active_id')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('despatches');
    }
};

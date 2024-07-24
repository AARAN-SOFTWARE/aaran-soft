<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSports()) {
            Schema::create('sport_contacts', function (Blueprint $table) {
                $table->id();
                $table->string('vname');
                $table->string('email')->nullable();
                $table->string('subject')->nullable();
                $table->longText('message')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('sport_contacts');
    }
};

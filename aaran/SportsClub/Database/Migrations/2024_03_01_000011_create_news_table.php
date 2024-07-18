<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSports()) {

            Schema::create('news', function (Blueprint $table) {
                $table->id();
                $table->string('headline');
                $table->longText('subject');
                $table->string('credits');
                $table->longText('image');
                $table->longText('image_desc');
                $table->longText('content');
                $table->foreignId('user_id')->references('id')->on('users');
                $table->smallInteger('active_id');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};

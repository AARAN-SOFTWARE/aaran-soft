<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasBlog()) {

            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->longText('body');
                $table->longText('image')->nullable();
                $table->foreignId('user_id')->references('id')->on('users');
                $table->foreignId('company_id')->references('id')->on('companies');
                $table->timestamps();
            });

            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->references('id')->on('users');
                $table->foreignId('post_id')->references('id')->on('posts');
                $table->text('body');
                $table->timestamps();
            });

            Schema::create('likes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id')->references('id')->on('posts');
                $table->tinyInteger('like')->default(0);
                $table->timestamps();
            });

        }
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasWebs()) {

            Schema::create('feed_replies', function (Blueprint $table) {
                $table->id();
                $table->foreignId('feed_id')->references('id')->on('feeds')->onDelete('cascade');
                $table->string('reply');
                $table->longText('reply_image');
                $table->foreignId('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_replies');
    }
};

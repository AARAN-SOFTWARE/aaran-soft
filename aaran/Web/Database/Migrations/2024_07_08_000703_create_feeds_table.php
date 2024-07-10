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

            Schema::create('feeds', function (Blueprint $table) {
                $table->id();
                $table->string('vname');
                $table->foreignId('feed_category_id')->references('id')->on('feed_categories')->onDelete('cascade');
                $table->longText('description');
                $table->smallInteger('bookmark');
                $table->longText('image');
                $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->smallInteger('active_id');
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeds');
    }
};

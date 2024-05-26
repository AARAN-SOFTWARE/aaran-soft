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
        Schema::create('review_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_filename_id')->references('id')->on('review_file_names')->onDelete('cascade');
            $table->foreignId('task_review_id')->references('id')->on('task_reviews')->onDelete('cascade');
            $table->smallInteger('completed')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_lists');
    }
};

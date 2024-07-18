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

            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('feed_category_id')->references('id')->on('feed_categories')->onDelete('cascade');
                $table->string('vname');
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
        Schema::dropIfExists('tags');
    }
};

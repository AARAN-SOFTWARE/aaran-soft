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
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloper()) {
            Schema::create('test_cases', function (Blueprint $table) {
                $table->id();
                $table->foreignId('modals_id')->references('id')->on('modals')->onDelete('cascade');
                $table->longText('action');
                $table->string('type')->nullable();
                $table->longText('test_case');
                $table->string('steps')->nullable();
                $table->string('test_data')->nullable();
                $table->string('input');
                $table->longText('expected_output')->nullable();
                $table->longText('actual_output');
                $table->string('browser')->nullable();
                $table->longText('comment')->nullable();
                $table->longText('feature')->nullable();
                $table->string('status');
                $table->longText('image')->nullable();
                $table->boolean('active_id');
                $table->boolean('checked')->default(0);
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_cases');
    }
};

<?php

use Aaran\Aadmin\Database\Migrations\RefactorMigrationTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasshareTrades()) {

            Schema::create('stocks', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->unique();
                $table->string('symbol')->unique();
                $table->foreignId('category_id')->nullable();
                $table->foreignId('tag_id')->nullable();
                $table->smallInteger('active_id')->nullable();
                $table->timestamps();
            });

            Schema::create('stock_details', function (Blueprint $table) {
                $table->id();
                $table->foreignId('stock_id')->references('id')->on('stocks')->cascadeOnDelete();
                $table->date('vdate')->nullable();
                $table->decimal('ltp', 15, 2)->nullable();
                $table->decimal('chg', 15, 2)->nullable();
                $table->decimal('chg_percent', 15, 2)->nullable();
                $table->decimal('volume', 15, 2)->nullable();
                $table->decimal('open_interest', 15, 2)->nullable();
                $table->decimal('open', 15, 2)->nullable();
                $table->decimal('close', 15, 2)->nullable();
                $table->decimal('high', 15, 2)->nullable();
                $table->decimal('low', 15, 2)->nullable();

                $table->decimal('high_52', 15, 2)->nullable();
                $table->decimal('low_52', 15, 2)->nullable();

                $table->decimal('all_high', 15, 2)->nullable();
                $table->decimal('all_low', 15, 2)->nullable();

                $table->decimal('pivot', 15, 2)->nullable();
                $table->decimal('r1', 15, 2)->nullable();
                $table->decimal('r2', 15, 2)->nullable();
                $table->decimal('r3', 15, 2)->nullable();
                $table->decimal('s1', 15, 2)->nullable();
                $table->decimal('s2', 15, 2)->nullable();
                $table->decimal('s3', 15, 2)->nullable();

                $table->string('trend')->nullable();

                $table->smallInteger('active_id')->nullable();
                $table->timestamps();
            });

        } else {
            RefactorMigrationTable::clear('2024_03_01_002001_create_stocks_table');
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_details');

        Schema::dropIfExists('stocks');
    }
};

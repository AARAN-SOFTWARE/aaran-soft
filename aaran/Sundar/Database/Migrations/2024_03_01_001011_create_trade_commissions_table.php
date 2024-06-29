<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasshareTrades()) {

            Schema::create('trade_commissions', function (Blueprint $table) {
                $table->id();
                $table->integer('serial')->nullable();
                $table->string('vdate')->nullable();
                $table->foreignId('share_trade_id')->references('id')->on('share_trades')->cascadeOnDelete();
                $table->decimal('stt', 15, 2)->nullable();
                $table->decimal('sebi_fee', 15, 2)->nullable();
                $table->decimal('stamp_duty', 15, 2)->nullable();
                $table->decimal('gst', 15, 2)->nullable();
                $table->decimal('amount', 15, 2)->nullable();
                $table->decimal('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('trade_commissions');
    }
};

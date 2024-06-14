<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasAudit()) {

            Schema::create('client_bank_balances', function (Blueprint $table) {
                $table->id();
                $table->foreignId('client_bank_id')->references('id')->on('client_banks')->onDelete('cascade');
                $table->date('cdate');
                $table->decimal('balance', 10, 3);
                $table->foreignId('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('client_bank_balances');
    }
};

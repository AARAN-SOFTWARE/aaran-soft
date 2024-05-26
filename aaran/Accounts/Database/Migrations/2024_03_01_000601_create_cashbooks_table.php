<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cashbooks', function (Blueprint $table) {
            $table->id();
            $table->string('acyear')->nullable();
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->date('vdate');
            $table->string('vmode');
            $table->foreignId('order_id')->nullable();
            $table->foreignId('cashbill_id')->nullable();
            $table->string('paidby')->nullable();
            $table->decimal('receipt',11,2);
            $table->decimal('payment',11,2);
            $table->decimal('balance',11,2);
            $table->string('approved')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status_id')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('active_id',10)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cashbooks');
    }
};

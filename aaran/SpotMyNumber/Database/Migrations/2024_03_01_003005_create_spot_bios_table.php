<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasSpotMyNumber()) {

            Schema::create('spot_bios', function (Blueprint $table) {
                $table->id();
                $table->foreignId('spot_customer_id')->references('id')->on('spot_customers');
                $table->string('title')->nullable();
                $table->text('slogan')->nullable();
                $table->longText('body_1')->nullable();
                $table->longText('body_2')->nullable();
                $table->string('pic')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('spot_bios');
    }
};

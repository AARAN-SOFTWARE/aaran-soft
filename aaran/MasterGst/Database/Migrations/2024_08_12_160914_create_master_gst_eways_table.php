<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_gst_eways', function (Blueprint $table) {
            $table->id();
            $table->longText('ewbno');
            $table->longText('ewbdt');
            $table->longText('ewbvalidtill');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_gst_eways');
    }
};

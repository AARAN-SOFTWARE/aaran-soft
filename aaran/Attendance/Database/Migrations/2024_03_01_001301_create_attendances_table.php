<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasAttendance()) {
            Schema::create('attendances', function (Blueprint $table) {
                $table->id();
                $table->string('uniqueno')->unique();
                $table->date('vdate');
                $table->string('in_time')->nullable();
                $table->string('out_time')->nullable();
                $table->string('amount')->nullable();
                $table->foreignId('company_id')->references('id')->on('companies');
                $table->foreignId('user_id')->references('id')->on('users');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};

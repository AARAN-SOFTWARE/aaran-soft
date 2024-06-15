<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasDeveloper()) {

            Schema::create('software_details', function (Blueprint $table) {
                $table->id();
                $table->string('sub_domain')->unique();
                $table->string('database')->nullable();
                $table->string('git')->nullable();
                $table->string('webhook')->nullable();
                $table->string('copy_build_folder')->nullable();
                $table->string('copy_env')->nullable();
                $table->string('db_migrate')->nullable();
                $table->string('storage_link')->nullable();
                $table->string('user_created')->nullable();
                $table->string('user_tenant_id')->nullable();
                $table->date('installed_on')->nullable();
                $table->string('soft_version')->nullable();
                $table->string('db_version')->nullable();
                $table->smallInteger('active_id')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('software_details');
    }
};


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
        Schema::create('cp', function (Blueprint $table) {
            $table->string('id_cp')->primary();
            $table->string('nama_cp');
            $table->string('wa_cp');
            $table->string('jabatan_cp');
            $table->string('visib_cp');
            $table->string('created_by');
            $table->string('modified_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cp');
    }
};

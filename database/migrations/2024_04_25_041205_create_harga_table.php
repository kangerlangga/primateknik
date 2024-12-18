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
        Schema::create('harga', function (Blueprint $table) {
            $table->string('id_harga')->primary();
            $table->string('produk_harga');
            $table->string('jenis_harga');
            $table->integer('nominal_harga');
            $table->string('visib_harga');
            $table->string('kapasitas_harga');
            $table->string('listrik_harga');
            $table->string('bonus_harga');
            $table->string('garansi_harga');
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
        Schema::dropIfExists('harga');
    }
};

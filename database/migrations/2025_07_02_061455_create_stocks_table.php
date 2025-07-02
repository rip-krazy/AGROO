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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang'); // Nama barang
            $table->string('kategori'); // Kategori barang (misalnya: Linen, Peralatan, dll)
            $table->integer('jumlah'); // Jumlah stok
            $table->string('satuan', 50); // Satuan (pcs, unit, liter, dll)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};

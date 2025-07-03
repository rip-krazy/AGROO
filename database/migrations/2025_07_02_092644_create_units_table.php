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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tipe'); // Standard, Deluxe, Suite, etc.
            $table->string('lokasi');
            $table->string('status')->default('Tersedia'); // Tersedia, Dalam Perawatan, Dipesan, Tidak Tersedia
            $table->integer('kapasitas')->default(2);
            $table->decimal('harga', 12, 2); // Harga per malam
            $table->text('deskripsi')->nullable();
            $table->date('tanggal')->nullable(); // atau datetime jika diperlukan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};

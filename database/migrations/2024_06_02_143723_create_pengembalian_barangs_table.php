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
        Schema::create('pengembalian_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('instrument_borrowal_id'); // peminjaman
            $table->unsignedBigInteger('instrument_id'); // ID alat musik tradisional
            $table->unsignedBigInteger('borrower_id'); // ID peminjam
            $table->date('tanggal_pengembalian');
            $table->text('keterangan')->nullable();
            $table->integer('jumlah')->default(1);
            $table->integer('jumlah_bagus')->default(1);
            $table->integer('jumlah_rusak')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_barangs');
    }
};

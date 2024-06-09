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
        Schema::create('traditional_musical_instruments', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama alat musik tradisional
            $table->string('description'); // Deskripsi tentang alat musik tradisional
            $table->integer('instrument_categories_id'); // Jenis alat musik tradisional
            $table->string('origin'); // Asal alat musik tradisional
            $table->string('year', 4); // Tahun pembuatan alat musik tradisional
            $table->string('material'); // Bahan pembuatan alat musik tradisional
            $table->integer('availability'); // Jumlah ketersediaan alat musik tradisional
            $table->integer('lendable'); // Jumlah alat yang bisa dipinjam
            $table->integer('broken'); // Jumlah alat yang rusak
            $table->string("image")->nullable(); // URL gambar alat musik tradisional
            $table->string('video')->nullable(); // URL video alat musik tradisional
            $table->string('audio')->nullable(); // URL audio alat musik tradisional
            $table->text('history')->nullable(); // Sejarah alat musik tradisional
            $table->text('source')->nullable(); // Sumber informasi tentang alat musik tradisional
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });

        Schema::create('instrument_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kategori alat musik
            $table->string('description')->nullable(); // Deskripsi opsional tentang kategori
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traditional_musical_instruments');
        Schema::dropIfExists('instrument_categories');
    }
};

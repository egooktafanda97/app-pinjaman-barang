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
            $table->string('origin'); // Asal alat musik tradisional
            $table->integer('year'); // Tahun pembuatan alat musik tradisional
            $table->string('material'); // Bahan pembuatan alat musik tradisional
            $table->integer('availability'); // Jumlah ketersediaan alat musik tradisional
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });

        Schema::create('instrument_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kategori alat musik
            $table->string('description')->nullable(); // Deskripsi opsional tentang kategori
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });

        Schema::create('instrument_category_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instrument_id'); // ID alat musik tradisional
            $table->unsignedBigInteger('category_id'); // ID kategori alat musik
            $table->foreign('instrument_id')->references('id')->on('traditional_musical_instruments')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('instrument_categories')->onDelete('cascade');
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });

        Schema::create('instrument_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instrument_id'); // ID alat musik tradisional
            $table->string('url'); // URL gambar alat musik
            $table->foreign('instrument_id')->references('id')->on('traditional_musical_instruments')->onDelete('cascade');
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
        Schema::dropIfExists('instrument_category_pivot');
        Schema::dropIfExists('instrument_images');
    }
};

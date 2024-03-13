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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama peminjam
            $table->string('email')->unique(); // Email peminjam (unik)
            $table->string('phone_number'); // Nomor telepon peminjam
            $table->string('address')->nullable(); // Alamat peminjam
            $table->date('birthdate')->nullable(); // Tanggal lahir peminjam
            $table->string('occupation')->nullable(); // Pekerjaan peminjam
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Jenis kelamin peminjam
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });

        Schema::create('instrument_borrowals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_id'); // ID peminjam
            $table->unsignedBigInteger('instrument_id'); // ID alat musik tradisional
            $table->dateTime('borrowed_at'); // Waktu peminjaman
            $table->dateTime('returned_at')->nullable(); // Waktu pengembalian (nullable karena bisa belum dikembalikan)
            $table->enum('status', ['pending', 'borrowed', 'returned'])->default('pending'); // Status peminjaman: tertunda, dipinjam, atau dikembalikan
            $table->foreign('borrower_id')->references('id')->on('borrowers')->onDelete('cascade');
            $table->foreign('instrument_id')->references('id')->on('traditional_musical_instruments')->onDelete('cascade');
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers');
        Schema::dropIfExists('instrument_borrowals');
    }
};

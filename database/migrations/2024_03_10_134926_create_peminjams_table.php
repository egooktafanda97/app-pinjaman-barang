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
            $table->integer("user_id");
            $table->string('name'); // Nama peminjam
            $table->string('phone_number'); // Nomor telepon peminjam
            $table->string('address')->nullable(); // Alamat peminjam
            $table->date('birthdate')->nullable(); // Tanggal lahir peminjam
            $table->string('occupation')->nullable(); // Pekerjaan peminjam
            $table->string('gender')->nullable(); // Jenis kelamin peminjam
            $table->string("foto")->nullable(); // URL foto peminjam
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });

        Schema::create('instrument_borrowals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_id'); // ID peminjam
            $table->unsignedBigInteger('instrument_id'); // ID alat musik tradisional
            $table->date('borrowed_at'); // Waktu peminjaman
            $table->date('returned_at')->nullable(); // Waktu pengembalian (nullable karena bisa belum dikembalikan)
            $table->text('purpose')->nullable();
            $table->integer('qty');
            $table->text('notes')->nullable();
            $table->enum('status_barang_dikembalikan', ["bagus", "rusak"])->nullable();
            $table->enum('status', ['pending', 'rejected', 'approved', 'borrowed', 'returned'])->default('pending'); // Status peminjaman: tertunda, dipinjam, atau dikembalikan
            $table->foreign('borrower_id')->references('id')->on('borrowers')->onDelete('cascade');
            $table->foreign('instrument_id')->references('id')->on('traditional_musical_instruments')->onDelete('cascade');
            $table->timestamps();
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

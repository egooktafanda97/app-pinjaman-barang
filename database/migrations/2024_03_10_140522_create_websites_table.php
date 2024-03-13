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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul artikel
            $table->text('content'); // Konten artikel
            $table->unsignedBigInteger('user_id'); // ID penulis artikel
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Kunci asing ke tabel pengguna
        });

        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('content'); // Konten tentang halaman
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Kunci pengaturan (unik)
            $table->text('value'); // Nilai pengaturan
            $table->timestamps(); // Waktu pembuatan dan pembaruan catatan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('abouts');
        Schema::dropIfExists('settings');
    }
};

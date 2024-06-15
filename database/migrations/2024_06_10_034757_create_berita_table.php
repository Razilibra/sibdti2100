<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'berita'
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); // Kolom id_berita sebagai primary key
            $table->string('judul', 50); // Kolom judul dengan tipe data string maksimal 50 karakter
            $table->foreignId('kategori_berita_id')->constrained('kategori_berita', 'id_kategori_berita'); // Kolom kategori_berita_id sebagai foreign key ke tabel 'kategori_berita'
            $table->string('gambar', 100); // Kolom gambar dengan tipe data string maksimal 100 karakter
            $table->date('tanggal_publikasi'); // Kolom tanggal_publikasi dengan tipe data date
            $table->timestamps(); // Kolom created_at dan updated_at untuk penanda waktu pembuatan dan pembaruan
        });
    }

    /**
     * Rollback migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Hapus tabel 'berita' jika migrasi di-rollback
        Schema::dropIfExists('berita');
    }
}

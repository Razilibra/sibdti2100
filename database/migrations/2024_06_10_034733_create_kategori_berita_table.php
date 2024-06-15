<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriBeritaTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'kategori_berita'
        Schema::create('kategori_berita', function (Blueprint $table) {
            $table->id('id_kategori_berita'); // Kolom id_kategori_berita sebagai primary key
            $table->string('nama_kategori', 50); // Kolom nama_kategori dengan tipe data string maksimal 50 karakter
            $table->string('deskripsi', 60); // Kolom deskripsi dengan tipe data string maksimal 60 karakter
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
        // Hapus tabel 'kategori_berita' jika migrasi di-rollback
        Schema::dropIfExists('kategori_berita');
    }
}

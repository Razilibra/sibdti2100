<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'peminjaman' jika belum ada
        if (!Schema::hasTable('peminjaman')) {
            Schema::create('peminjaman', function (Blueprint $table) {
                $table->id('id_peminjaman'); // Kolom id_peminjaman sebagai primary key
                $table->foreignId('id_barang_masuk')->constrained('barang_masuk', 'id_barang_masuk'); // Kolom id_barang_masuk sebagai foreign key ke tabel 'barang_masuk'
                $table->foreignId('id_user')->constrained('users', 'id_user'); // Kolom id_user sebagai foreign key ke tabel 'users'
                $table->integer('jumlah'); // Kolom jumlah dengan tipe data integer
                $table->date('tanggal_pinjam'); // Kolom tanggal_pinjam dengan tipe data date
                $table->date('tanggal_kembali'); // Kolom tanggal_kembali dengan tipe data date
                $table->text('keterangan')->nullable(); // Kolom keterangan dengan tipe data text yang dapat bernilai null
                $table->string('jaminan', 250); // Kolom jaminan dengan tipe data string maksimal 250 karakter
                $table->unsignedBigInteger('penanggung_jawab')->nullable(); // Kolom penanggung_jawab sebagai nullable unsigned big integer
                $table->timestamps(); // Kolom created_at dan updated_at untuk penanda waktu pembuatan dan pembaruan
            });
        }
    }

    /**
     * Rollback migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Hapus tabel 'peminjaman' jika migrasi di-rollback
        Schema::dropIfExists('peminjaman');
    }
}

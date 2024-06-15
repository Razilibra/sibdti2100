<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembalianTable2024 extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'pengembalian' jika belum ada
        if (!Schema::hasTable('pengembalian')) {
            Schema::create('pengembalian', function (Blueprint $table) {
                $table->id('id_pengembalian'); // Kolom id_pengembalian sebagai primary key
                $table->foreignId('id_peminjaman')->constrained('peminjaman', 'id_peminjaman'); // Kolom id_peminjaman sebagai foreign key ke tabel 'peminjaman'
                $table->foreignId('id_user')->constrained('users', 'id_user'); // Kolom id_user sebagai foreign key ke tabel 'users'
                $table->enum('kondisi', ['Bagus', 'Rusak', 'Normal']); // Kolom kondisi dengan tipe data enum
                $table->date('tanggal_kembali'); // Kolom tanggal_kembali dengan tipe data date
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
        // Hapus tabel 'pengembalian' jika migrasi di-rollback
        Schema::dropIfExists('pengembalian');
    }
}

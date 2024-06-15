<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        // Tidak ada perubahan langsung pada tabel 'dosen_staff', jadi tidak ada perubahan dalam blueprint

        // Tambahkan kunci asing ke tabel 'peminjaman'
        Schema::table('peminjaman', function (Blueprint $table) {
            // Mengubah kolom 'penanggung_jawab' menjadi nullable dan menambahkan kunci asing
            $table->unsignedBigInteger('penanggung_jawab')->nullable()->change();
            $table->foreign('penanggung_jawab')
                  ->references('nip_nik')
                  ->on('dosen_staff')
                  ->onDelete('cascade'); // Saat dosen_staff dihapus, peminjaman juga akan dihapus
        });

        // Tambahkan kunci asing ke tabel 'pengembalian'
        Schema::table('pengembalian', function (Blueprint $table) {
            // Mengubah kolom 'penanggung_jawab' menjadi nullable dan menambahkan kunci asing
            $table->unsignedBigInteger('penanggung_jawab')->nullable()->change();
            $table->foreign('penanggung_jawab')
                  ->references('nip_nik')
                  ->on('dosen_staff')
                  ->onDelete('cascade'); // Saat dosen_staff dihapus, pengembalian juga akan dihapus
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        // Hapus kunci asing dari tabel 'peminjaman'
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign(['penanggung_jawab']);
        });

        // Hapus kunci asing dari tabel 'pengembalian'
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->dropForeign(['penanggung_jawab']);
        });

        // Tidak ada perubahan langsung pada tabel 'dosen_staff', jadi tidak ada perubahan dalam blueprint
    }
};

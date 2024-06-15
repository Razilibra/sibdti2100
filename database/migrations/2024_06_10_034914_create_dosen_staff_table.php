<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenStaffTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'dosen_staff' jika belum ada
        if (!Schema::hasTable('dosen_staff')) {
            Schema::create('dosen_staff', function (Blueprint $table) {
                $table->id('id_dosen_staff'); // Kolom id_dosen_staff sebagai primary key
                $table->unsignedBigInteger('nip_nik')->unique(); // Kolom nip_nik sebagai unique
                $table->foreignId('id_user')->constrained('users', 'id_user'); // Kolom id_user sebagai foreign key ke tabel 'users'
                $table->string('nama', 100); // Kolom nama dengan tipe data string maksimal 100 karakter
                $table->string('jabatan_akademik', 50); // Kolom jabatan_akademik dengan tipe data string maksimal 50 karakter
                $table->string('no_telepon', 20); // Kolom no_telepon dengan tipe data string maksimal 20 karakter
                $table->string('email', 100); // Kolom email dengan tipe data string maksimal 100 karakter
                $table->string('foto', 255); // Kolom foto dengan tipe data string maksimal 255 karakter
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
        // Hapus tabel 'dosen_staff' jika migrasi di-rollback
        Schema::dropIfExists('dosen_staff');
    }
}

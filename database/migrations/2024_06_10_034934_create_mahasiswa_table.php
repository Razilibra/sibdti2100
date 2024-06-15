<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'mahasiswa'
        Schema::create('mahasiswa', function (Blueprint $table) {
            // Definisi kolom-kolom
            $table->integer('nim')->primary()->unique(); // Kolom nim sebagai primary key
            $table->foreignId('id_user')->constrained('users', 'id_user'); // Kolom id_user sebagai foreign key ke tabel 'users'
            $table->string('nama', 100); // Kolom nama dengan tipe data string maksimal 100 karakter
            $table->string('program_studi', 50); // Kolom program_studi dengan tipe data string maksimal 50 karakter
            $table->year('angkatan'); // Kolom angkatan dengan tipe data year
            $table->decimal('ipk', 3, 2); // Kolom ipk dengan tipe data decimal (3 digit total, 2 digit di belakang koma)
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
        // Hapus tabel 'mahasiswa' jika migrasi di-rollback
        Schema::dropIfExists('mahasiswa');
    }
}

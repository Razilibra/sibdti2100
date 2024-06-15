<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'barang_masuk'
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('id_barang_masuk'); // Kolom id_barang_masuk sebagai primary key
            $table->foreignId('id_supplier')->constrained('supplier', 'id_supplier'); // Kolom id_supplier sebagai foreign key ke tabel 'supplier'
            $table->string('nama_barang', 100); // Kolom nama_barang dengan tipe data string maksimal 100 karakter
            $table->enum('posisi', ['Lab-201', 'Lab-202', 'Lab-204', 'Lab-208', 'Lab-301', 'Lab-302', 'Lab-306', 'Lab-308', 'Lab-310', 'Lab-311']); // Kolom posisi dengan tipe data enum yang dapat memiliki nilai dari daftar yang telah ditentukan
            $table->string('foto', 50); // Kolom foto dengan tipe data string maksimal 50 karakter
            $table->date('tanggal_masuk'); // Kolom tanggal_masuk dengan tipe data date
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
        // Hapus tabel 'barang_masuk' jika migrasi di-rollback
        Schema::dropIfExists('barang_masuk');
    }
}

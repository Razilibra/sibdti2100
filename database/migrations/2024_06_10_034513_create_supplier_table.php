<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'supplier'
        Schema::create('supplier', function (Blueprint $table) {
            $table->id('id_supplier'); // Kolom id_supplier sebagai primary key
            $table->string('nama_supplier', 50); // Kolom nama_supplier dengan tipe data string maksimal 50 karakter
            $table->string('telepon_supplier', 18); // Kolom telepon_supplier dengan tipe data string maksimal 18 karakter
            $table->string('email_supplier', 50)->unique(); // Kolom email_supplier dengan tipe data string maksimal 50 karakter yang harus bersifat unik
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
        // Hapus tabel 'supplier' jika migrasi di-rollback
        Schema::dropIfExists('supplier');
    }
}

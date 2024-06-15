<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'stok'
        Schema::create('stok', function (Blueprint $table) {
            $table->id('id_stok'); // Kolom id_stok sebagai primary key
            $table->foreignId('id_barang_masuk')->constrained('barang_masuk', 'id_barang_masuk'); // Kolom id_barang_masuk sebagai foreign key ke tabel 'barang_masuk'
            $table->integer('jumlah'); // Kolom jumlah dengan tipe data integer
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
        // Hapus tabel 'stok' jika migrasi di-rollback
        Schema::dropIfExists('stok');
    }
}

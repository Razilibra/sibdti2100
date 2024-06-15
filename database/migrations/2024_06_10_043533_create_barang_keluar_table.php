
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'barang_keluar' hanya jika belum ada
        if (!Schema::hasTable('barang_keluar')) {
            Schema::create('barang_keluar', function (Blueprint $table) {
                $table->id('id_barang_keluar');
                $table->unsignedBigInteger('id_peminjaman');
                $table->integer('jumlah');
                $table->date('tanggal_keluar');
                $table->timestamps();

                // Menambahkan kunci asing untuk 'id_peminjaman' yang merujuk ke tabel 'peminjaman'
                $table->foreign('id_peminjaman')
                    ->references('id_peminjaman')
                    ->on('peminjaman')
                    ->onDelete('cascade') // Saat peminjaman terkait dihapus, catatan barang keluar juga akan dihapus
                    ->onUpdate('cascade'); // Saat id_peminjaman di-update, kunci asing di-update juga
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
        // Hapus tabel 'barang_keluar' jika migrasi di-rollback
        Schema::dropIfExists('barang_keluar');
    }
}

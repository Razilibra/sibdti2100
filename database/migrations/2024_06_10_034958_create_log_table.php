<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel 'log'
        Schema::create('log', function (Blueprint $table) {
            $table->id('id_log');
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->enum('tipe_aktivitas', ['Tambah', 'Ubah', 'Hapus']);
            $table->string('tabel_terkait', 50);
            $table->text('data_sebelum')->nullable();
            $table->text('data_sesudah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Hapus tabel 'log' jika migrasi di-rollback
        Schema::dropIfExists('log');
    }
}

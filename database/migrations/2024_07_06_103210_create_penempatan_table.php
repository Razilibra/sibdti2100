<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenempatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penempatan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('posisi', 50); // Example column
            $table->foreignId('id_barang')->constrained('barang'); // Foreign key to 'barang' table
            $table->foreignId('id_ruangan')->constrained('ruangan');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penempatan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 50);
            $table->foreignId('kategori_berita_id')->constrained('kategori_berita');
            $table->string('gambar', 100);
            $table->date('tanggal_publikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_berita');
    }
};

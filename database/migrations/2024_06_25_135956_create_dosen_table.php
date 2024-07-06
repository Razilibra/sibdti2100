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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('nip')->unique(); // Kolom nip_nik sebagai unique
            $table->foreignId('id_user')->constrained('user');
           $table->string('jabatan_akademik', 50); // Kolom jabatan_akademik dengan tipe data string maksimal 50 karakter
           $table->string('no_telepon', 20); // Kolom no_telepon dengan tipe data string maksimal 20 karakter
           $table->string('email', 100); // Kolom email dengan tipe data string maksimal 100 karakter
           $table->string('foto', 255); // Kolom foto dengan tipe data string maksimal 255 karakter
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};

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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->foreignId('id_user')->constrained('user');
            // Kolom na    ma dengan tipe data string maksimal 100 karakter
            $table->string('program_studi', 50); // Kolom program_studi dengan tipe data string maksimal 50 karakter
            $table->year('angkatan'); // Kolom angkatan dengan tipe data year
            $table->decimal('ipk', 3, 2); // Kolom ipk dengan tipe data decimal (3 digit total, 2 digit di belakang koma)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};

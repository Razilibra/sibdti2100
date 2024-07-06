<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;

class KategoriBeritaSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 data dummy KategoriBerita
        KategoriBerita::factory()->count(10)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BarangMasuk;

class BarangMasukSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 data dummy BarangMasuk
        BarangMasuk::factory()->count(10)->create();
    }
}
    
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stok;

class StokSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 data dummy Stok
        Stok::factory()->count(10)->create();
    }
}

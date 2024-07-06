<?php

namespace Database\Factories;

use App\Models\Stok;
use App\Models\BarangMasuk;
use Illuminate\Database\Eloquent\Factories\Factory;

class StokFactory extends Factory
{
    protected $model = Stok::class;

    public function definition()
    {
        return [
            'id_barang_masuk' => BarangMasuk::factory(),
            'kode_barang' => $this->faker->unique()->bothify('KB###'),
            'nama_barang' => $this->faker->word,
            'posisi' => $this->faker->word,
            'foto' => $this->faker->imageUrl(640, 480, 'technics'),
            'spesifikasi' => $this->faker->sentence,
            'jumlah_barang' => $this->faker->numberBetween(1, 100),
        ];
    }
}

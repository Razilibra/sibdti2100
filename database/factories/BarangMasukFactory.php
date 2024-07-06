<?php

namespace Database\Factories;

use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangMasukFactory extends Factory
{
    protected $model = BarangMasuk::class;

    public function definition()
    {
        return [
            'id_supplier' => Supplier::factory(),
            'kode_barang' => $this->faker->unique()->ean13,
            'nama_barang' => $this->faker->words(3, true),
            'posisi' => $this->faker->word,
            'foto' => $this->faker->imageUrl(),
            'tanggal_masuk' => $this->faker->date(),
            'jumlah_barang' => $this->faker->numberBetween(1, 100),
        ];
    }
}

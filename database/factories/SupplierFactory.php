<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition()
    {
        return [
            'kode_barang' => $this->faker->unique()->bothify('KB###'),
            'nama_barang' => $this->faker->word,
            'nama_supplier' => $this->faker->company,
            'telepon_supplier' => $this->faker->phoneNumber,
            'jumlah_barang' => $this->faker->numberBetween(1, 100),
            'jenis_barang' => 'Elektronik', // Asumsikan jenis barang tetap Elektronik
            'foto' => $this->faker->imageUrl(640, 480, 'technics'),
            'posisi' => $this->faker->word,
            'tanggal' => $this->faker->date(),
        ];
    }
}

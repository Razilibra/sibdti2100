<?php

namespace Database\Factories;

use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriBeritaFactory extends Factory
{
    protected $model = KategoriBerita::class;

    public function definition()
    {
        return [
            'nama_kategori' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Menentukan primary key tabel
    protected $primaryKey = 'id_berita';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'judul',
        'kategori_berita_id',
        'gambar',
        'tanggal_publikasi',
    ];

    // Menggunakan timestamps
    public $timestamps = true;

    // Mendefinisikan relasi ke model KategoriBerita
    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id', 'id_kategori_berita');
    }
}

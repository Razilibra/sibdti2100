<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBerita extends Model
{
    use HasFactory;

    protected $table = 'master_berita';

    protected $fillable = [
        'judul',
        'kategori_berita_id',
        'gambar',
        'tanggal_publikasi',
    ];

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id');
    }
}

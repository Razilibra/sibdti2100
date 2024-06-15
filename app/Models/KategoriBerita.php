<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    // Menentukan primary key tabel
    protected $primaryKey = 'id_kategori_berita';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    // Menggunakan timestamps
    public $timestamps = true;
}

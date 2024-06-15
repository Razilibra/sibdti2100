<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    // Menentukan primary key tabel
    protected $primaryKey = 'id_stok';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_barang_masuk',
        'jumlah',
    ];

    // Menggunakan timestamps
    public $timestamps = true;

    // Mendefinisikan relasi ke model BarangMasuk
    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class, 'id_barang_masuk', 'id_barang_masuk');
    }
}

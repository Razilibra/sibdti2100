<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    // Menentukan primary key tabel
    protected $primaryKey = 'id_peminjaman';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_barang_masuk',
        'id_user',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'keterangan',
        'jaminan',
        'penanggung_jawab',
    ];

    // Menggunakan timestamps
    public $timestamps = true;

    // Mendefinisikan relasi ke model BarangMasuk
    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class, 'id_barang_masuk', 'id_barang_masuk');
    }

    // Mendefinisikan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Mendefinisikan relasi ke model User untuk penanggung jawab
    public function penanggungJawab()
    {
        return $this->belongsTo(User::class, 'penanggung_jawab', 'id_user');
    }
}

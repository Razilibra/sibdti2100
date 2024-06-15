<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar'; // Sesuaikan dengan nama tabel yang digunakan

    protected $primaryKey = 'id_barang_keluar'; // Kolom yang digunakan sebagai primary key

    protected $keyType = 'integer'; // Tipe data primary key

    protected $fillable = [
        'id_peminjaman',
        'jumlah',
        'tanggal_keluar',
    ];

    // Relasi dengan tabel peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}

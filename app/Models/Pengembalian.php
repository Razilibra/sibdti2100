<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari nama model dalam bentuk jamak
    protected $table = 'pengembalian';

    // Menentukan primary key tabel
    protected $primaryKey = 'id_pengembalian';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_peminjaman',
        'id_user',
        'kondisi',
        'tanggal_kembali',
        'penanggung_jawab'
    ];

    // Menggunakan timestamps
    public $timestamps = true;

    // Mendefinisikan relasi ke model Peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman', 'id_peminjaman');
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

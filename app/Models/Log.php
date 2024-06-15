<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'log'; // Sesuaikan dengan nama tabel yang digunakan

    protected $primaryKey = 'id_log'; // Kolom yang digunakan sebagai primary key

    protected $keyType = 'integer'; // Tipe data primary key

    protected $fillable = [
        'id_user',
        'tipe_aktivitas',
        'tabel_terkait',
        'data_sebelum',
        'data_sesudah',
    ];

    // Relasi dengan tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

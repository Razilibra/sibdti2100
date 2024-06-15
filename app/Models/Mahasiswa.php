<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Sesuaikan dengan nama tabel yang digunakan

    protected $primaryKey = 'nim'; // Kolom yang digunakan sebagai primary key

    protected $keyType = 'integer'; // Tipe data primary key

    public $incrementing = false; // Karena primary key bukan auto-increment

    protected $fillable = [
        'nim',
        'id_user',
        'nama',
        'program_studi',
        'angkatan',
        'ipk',
    ];

    // Relasi dengan tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

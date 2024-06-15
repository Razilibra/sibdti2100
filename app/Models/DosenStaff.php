<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenStaff extends Model
{
    use HasFactory;

    protected $table = 'dosen_staff'; // Sesuaikan nama tabel jika perlu

    protected $primaryKey = 'id_dosen_staff'; // Nama kolom primary key

    protected $fillable = [
        'nip_nik',
        'id_user',
        'nama',
        'jabatan_akademik',
        'no_telepon',
        'email',
        'foto',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

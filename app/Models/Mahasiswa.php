<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'id_user',
        'program_studi',
        'angkatan',
        'ipk',

    ];

    /**
     * Get the user associated with the mahasiswa.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

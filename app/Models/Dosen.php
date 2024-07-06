<?php

// app/Models/Dosen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{

    /* protected $primarykey = "id"; */
    protected $table ="dosen";
    protected $fillable = [
        'nip', 'id_user', 'jabatan_akademik', 'no_telepon', 'email', 'foto',
    ];

    // Contoh relasi jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

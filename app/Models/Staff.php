<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    // protected $primarykey = "id";
    protected $table = "staff";
    protected $fillable = [
        'nik',
        'id_user',
        'jabatan_akademik',
        'no_telepon',
        'email',
        'foto'
    ];

    public function datauser()
    {
        return $this->belongsTo(User::class, 'id_user','nama');
    }
}

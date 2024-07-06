<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $primarykey ='id';
    protected $table = 'log';

    protected $fillable = [
        'id_user', 'tipe_aktivitas', 'tabel_terkait', 'data_sebelum', 'data_sesudah'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

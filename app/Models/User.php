<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';

    protected $guarded = ['id'
    ];

    protected $hidden = [
        'nama',
        'email',
        'password',
        'role',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function user()
    {
        return $this->hasMany(Mahasiswa::class, 'id');
    }
    public function users()
    {
        return $this->hasMany(Dosen::class, 'id');
    }

    public function datauser()
    {
        return $this->hasMany(Staff::class, 'id');
    }

    public function datalog()
    {
        return $this->hasMany(Log::class, 'id_user');
    }
}


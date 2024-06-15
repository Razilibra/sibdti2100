<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_supplier';

    protected $fillable = [
        'nama_supplier',
        'telepon_supplier',
        'email_supplier',
    ];

    public $timestamps = true;
}

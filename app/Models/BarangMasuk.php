<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_barang_masuk';

    protected $fillable = [
        'id_supplier',
        'nama_barang',
        'posisi',
        'foto',
        'tanggal_masuk',
    ];

    public $timestamps = true;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }
}

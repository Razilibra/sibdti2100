<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            'nama_barang' => $row['nama_barang'],    // Adjust the keys to match your Excel headings
            'kode_barang' => $row['kode_barang'],
            'stok'        => $row['stok'],
            'foto'        => $row['foto'],
            'status'      => $row['status'],
            'posisi'      => $row['posisi'],
        ]);
    }
}

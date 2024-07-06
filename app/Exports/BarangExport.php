<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Kode Barang',
            'Stok',
            'Foto',
            'Status',
            'Posisi',
            'Created At',
            'Updated At'
        ];
    }
}

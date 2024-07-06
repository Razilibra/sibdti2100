<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data dummy untuk disimpan di dalam array
        DB::table('supplier')->insert([
            [
                'nama_supplier' => 'Supplier A',
                'telepon_supplier' => '081234567890',
            ],
            [
                'nama_supplier' => 'Supplier B',
                'telepon_supplier' => '081234567891',
            ],
            [
                'nama_supplier' => 'Supplier C',
                'telepon_supplier' => '081234567892',
            ],
            [
                'nama_supplier' => 'Supplier D',
                'telepon_supplier' => '081234567893',
            ],
            [
                'nama_supplier' => 'Supplier E',
                'telepon_supplier' => '081234567894',
            ],
            [
                'nama_supplier' => 'Supplier F',
                'telepon_supplier' => '081234567895',
            ],
            [
                'nama_supplier' => 'Supplier G',
                'telepon_supplier' => '081234567896',
            ],
            [
                'nama_supplier' => 'Supplier H',
                'telepon_supplier' => '081234567897',
            ],
            [
                'nama_supplier' => 'Supplier I',
                'telepon_supplier' => '081234567898',
            ],
            [
                'nama_supplier' => 'Supplier J',
                'telepon_supplier' => '081234567899',
            ],
            [
                'nama_supplier' => 'Supplier K',
                'telepon_supplier' => '081234567800',
            ],
            [
                'nama_supplier' => 'Supplier L',
                'telepon_supplier' => '081234567801',
            ],
            [
                'nama_supplier' => 'Supplier M',
                'telepon_supplier' => '081234567802',
            ],
            [
                'nama_supplier' => 'Supplier N',
                'telepon_supplier' => '081234567803',
            ],
            [
                'nama_supplier' => 'Supplier O',
                'telepon_supplier' => '081234567804',
            ],
        ]);
            // Tambahkan data lainnya sesuai kebutuhan



    }
}


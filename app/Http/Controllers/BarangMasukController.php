<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Menampilkan daftar barang masuk.
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::all();
        return view('barang_masuk.index', ['barangMasuk' => $barangMasuk]);
    }

    /**
     * Menampilkan formulir untuk membuat barang masuk baru.
     */
    public function create()
    {
        return view('barang_masuk.create');
    }

    /**
     * Menyimpan barang masuk yang baru dibuat.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_supplier' => 'required',
            'nama_barang' => 'required',
            'posisi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_masuk' => 'required|date',
        ]);

        // Simpan gambar ke penyimpanan
        $imagePath = $request->file('foto')->store('uploads', 'public');

        BarangMasuk::create([
            'id_supplier' => $request->id_supplier,
            'nama_barang' => $request->nama_barang,
            'posisi' => $request->posisi,
            'foto' => $imagePath,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('barang_masuk.index')
            ->with('success', 'Barang masuk berhasil ditambahkan.');
    }

    // Metode lainnya seperti show(), edit(), update(), dan destroy() bisa ditambahkan di sini
}

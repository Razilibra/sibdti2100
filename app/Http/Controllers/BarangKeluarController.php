<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Menampilkan daftar barang keluar.
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::all();
        return view('barang_keluar.index', ['barangKeluar' => $barangKeluar]);
    }

    /**
     * Menampilkan formulir untuk membuat barang keluar baru.
     */
    public function create()
    {
        return view('barang_keluar.create');
    }

    /**
     * Menyimpan barang keluar yang baru dibuat.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal_keluar' => 'required|date',
        ]);

        BarangKeluar::create($request->all());

        return redirect()->route('barang_keluar.index')
            ->with('success', 'Barang keluar berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail barang keluar.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        return view('barang_keluar.show', ['barangKeluar' => $barangKeluar]);
    }

    /**
     * Menampilkan formulir untuk mengedit barang keluar.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        return view('barang_keluar.edit', ['barangKeluar' => $barangKeluar]);
    }

    /**
     * Memperbarui barang keluar yang sudah ada.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal_keluar' => 'required|date',
        ]);

        $barangKeluar->update($request->all());

        return redirect()->route('barang_keluar.index')
            ->with('success', 'Barang keluar berhasil diperbarui.');
    }

    /**
     * Menghapus barang keluar.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();

        return redirect()->route('barang_keluar.index')
            ->with('success', 'Barang keluar berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Barang Keluar";
        $barangKeluars = BarangKeluar::all();
        $role = session('role');
        return view('admin.barangkeluar.index', compact('barangKeluars','title','role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Barang Keluar";
        $peminjamans = Peminjaman::all();
        $role = session('role');
        return view('admin.barangkeluar.create', compact('peminjamans','title','role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id',
            'tanggal_keluar' => 'required|date',
        ]);

          // Buat BarangKeluar baru
          $barangKeluar = BarangKeluar::create($request->all());

          // Cari entri peminjaman terkait
          $peminjaman = Peminjaman::find($request->id_peminjaman);
          if ($peminjaman) {
              // Kurangi stok barang
              $barang = Barang::find($peminjaman->id_barang);
              if ($barang) {
                  $barang->stok -= $peminjaman->jumlah; // Mengurangi stok barang sesuai jumlah peminjaman
                  $barang->save();
              }
          }
        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        $title="Barang Keluar";
        $role = session('role');
        return view('admin.barangkeluar.show', compact('barangKeluar','title','role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        $title="Barang Keluar";
        $peminjamans = Peminjaman::all();
        $role = session('role');
        return view('admin.barangkeluar.edit', compact('barangKeluar', 'peminjamans','title','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id',
            'tanggal_keluar' => 'required|date',
        ]);

        $barangKeluar->update($request->all());
        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        $peminjaman = Peminjaman::find($barangKeluar->id_peminjaman);
        if ($peminjaman) {
            // Tambahkan kembali stok barang
            $barang = Barang::find($peminjaman->id_barang);
            if ($barang) {
                $barang->stok += $peminjaman->jumlah; // Menambahkan stok barang sesuai jumlah peminjaman
                $barang->save();
            }
        }
        $barangKeluar->delete();
        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar deleted successfully.');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $title = 'daftar Barang Keluar';
        $barangKeluars = BarangKeluar::where('id_peminjaman', 'LIKE', "%$keyword%")
            ->orWhere('tanggal_keluar', 'LIKE', "%$keyword%")
            ->get();

            $role = session('role');
        return view('admin.barangkeluar.index', compact('barangKeluars','title','role'));
    }
}

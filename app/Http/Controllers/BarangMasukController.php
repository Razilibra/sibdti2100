<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Barang;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Barang Masuk";
        $barangMasuk = BarangMasuk::all();
        $role = session('role');
        return view('admin.barangmasuk.index', compact('barangMasuk', 'title','role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Barang Masuk";
        $supplier = Supplier::all(); // Assuming Supplier model exists
        $barangs = Barang::all(); // Assuming Barang model exists
        $role = session('role');
        return view('admin.barangmasuk.create', compact('supplier', 'barangs', 'title','role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'jumlah_barang' => 'required|integer',
            'id_supplier' => 'required',
            'id_barang' => 'required',
        ]);

        $barang = Barang::find($request->id_barang);
        if ($barang) {
            $barang->stok += $request->jumlah_barang; // Mengupdate stok barang
            $barang->save();
        }


        BarangMasuk::create($request->all());
        return redirect()->route('barang-masuk.index')->with('success', 'Barang Masuk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        $title="Barang Masuk";
        $role = session('role');
        return view('admin.barangmasuk.show', compact('barangMasuk','title','role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title="Barang Masuk";
        $barangMasuk = BarangMasuk::findOrFail($id);
        $supplier = Supplier::all(); // Assuming you have a Supplier model
        $barangs = Barang::all(); // Assuming you also need Barang data
        $role = session('role');
        return view('admin.barangmasuk.edit', compact('barangMasuk', 'supplier', 'barangs','title','role'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'jumlah_barang' => 'required|integer',
            'id_supplier' => 'required|exists:supplier,id',
            'id_barang' => 'required|exists:barang,id',
        ]);

        $barangMasuk->update($request->all());
        return redirect()->route('barang-masuk.index')->with('success', 'Barang Masuk updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        $barang = Barang::find($barangMasuk->id_barang);
        if ($barang) {
            $barang->stok -= $barangMasuk->jumlah_barang; // Mengurangi stok barang
            $barang->save();
        }

        $barangMasuk->delete();
        return redirect()->route('barang-masuk.index')->with('success', 'Barang Masuk deleted successfully.');
    }
}

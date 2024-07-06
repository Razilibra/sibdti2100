<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $title = "Daftar Peminjaman";
    $role = session('role');
    $userId = session('id_user'); // Asumsi id_user disimpan di session

    // Inisialisasi query
    $query = Peminjaman::with('barang', 'user');

    // Tambahkan kondisi where jika role adalah mahasiswa
    if ($role !== 'admin') {
        $query->where('id_user', $userId);
    }

    // Eksekusi query
    $peminjaman = $query->get();

    return view('admin.peminjaman.index', compact('peminjaman', 'title', 'role'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Daftar Peminjaman";
        $barangs = Barang::all();
        $users = User::all();
        $role = session('role');
        return view('admin.peminjaman.create', compact('barangs', 'users','title','role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_user' => 'required',
            'jumlah' => 'required|integer',
            'tanggal_pinjam' => 'required|date',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $title="Daftar Peminjaman";
        $role = session('role');
        return view('admin.peminjaman.show', compact('peminjaman','title','role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $title="Daftar Peminjaman";
        $barangs = Barang::all();
        $users = User::all();
        $role = session('role');
        return view('admin.peminjaman.edit', compact('peminjaman', 'barangs', 'users','title','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'id_user' => 'required|exists:user,id',
            'jumlah' => 'required|integer',
            'tanggal_pinjam' => 'required|date',
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman deleted successfully.');
    }
}

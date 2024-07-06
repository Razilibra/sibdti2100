<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Barang;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Daftar Pengembalian";
        $role = session('role');
        $id_user = session('id_user');

        if ($role !== 'admin') {
            // Mengambil data pengembalian hanya untuk pengguna yang sedang login jika rolenya mahasiswa
            $pengembalian = Pengembalian::join('peminjaman', 'pengembalian.id_peminjaman', '=', 'peminjaman.id')
                            ->where('peminjaman.id_user', $id_user)
                            ->select('pengembalian.*', 'peminjaman.id_user')
                            ->get();
        } else {
            // Mengambil semua data pengembalian jika rolenya bukan mahasiswa
            $pengembalian = Pengembalian::join('peminjaman', 'pengembalian.id_peminjaman', '=', 'peminjaman.id')
                            ->select('pengembalian.*', 'peminjaman.id_user')
                            ->get();
        }

        return view('admin.pengembalian.index', compact('pengembalian', 'title', 'role'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */public function create()
{
    $title = "Daftar Pengembalian";
    $role = session('role');
    $id_user = session('id_user');

    if ($role !== 'admin') {
        // Ambil data peminjaman yang terkait dengan id_user
        $peminjaman = Peminjaman::where('id_user', $id_user)->get();
    } else {
        // Ambil semua data peminjaman
        $peminjaman = Peminjaman::all();
    }

    return view('admin.pengembalian.create', compact('peminjaman', 'title', 'role'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id',
        ]);

        Pengembalian::create($request->all());
        $peminjaman = Peminjaman::find($request->id_peminjaman);
        if ($peminjaman) {
            // Kurangi stok barang
            $barang = Barang::find($peminjaman->id_barang);
            if ($barang) {
                $barang->stok += $peminjaman->jumlah; // Mengurangi stok barang sesuai jumlah peminjaman
                $barang->save();
            }
        }
        return redirect()->route('pengembalian.index')
                         ->with('success', 'Pengembalian created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {

        $title="Daftar Pengembalian";
        $role = session('role');
        return view('admin.pengembalian.show', compact('pengembalian','title','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        $title="Daftar Pengembalian";
        $role = session('role');
        $id_user = session('id_user');

    if ($role !== 'admin') {
        // Ambil data peminjaman yang terkait dengan id_user
        $peminjaman = Peminjaman::where('id_user', $id_user)->get();
    } else {
        // Ambil semua data peminjaman
        $peminjaman = Peminjaman::all();
    }
        return view('admin.pengembalian.edit', compact('pengembalian','title','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $Pengembalian)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id',
        ]);

        $Pengembalian->update($request->all());

        return redirect()->route('pengembalian.index')
                         ->with('success', 'Pengembalian updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $Pengembalian)
    {    $peminjaman = Peminjaman::find($Pengembalian->id_peminjaman);
        if ($peminjaman) {
            // Tambahkan kembali stok barang
            $barang = Barang::find($peminjaman->id_barang);
            if ($barang) {
                $barang->stok -= $peminjaman->jumlah; // Menambahkan stok barang sesuai jumlah peminjaman
                $barang->save();
            }
        }
        $Pengembalian->delete();

        return redirect()->route('pengembalian.index')
                         ->with('success', 'Pengembalian deleted successfully.');
    }
}


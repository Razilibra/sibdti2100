<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $title="Daftar Kategori Berita";
        $kategoriBerita = KategoriBerita::all();
        $role = session('role');
        return view('admin.kategoriberita.index', compact('kategoriBerita','title','role'));
    }

    public function create()
    {
        $title="Daftar Kategori Berita";
        $role = session('role');
        return view('admin.kategoriberita.create',compact('title','role'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        KategoriBerita::create($validatedData);

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $title="Daftar Kategori Berita";
        $role = session('role');
        $kategoriBerita = KategoriBerita::findOrFail($id);
        return view('admin.kategoriberita.show', compact('kategoriBerita','title','role'));
    }

    public function edit($id)
    {
        $title="Daftar Kategori Berita";
        $kategoriBerita = KategoriBerita::findOrFail($id);
        $role = session('role');
        return view('admin.kategoriberita.edit', compact('kategoriBerita','title','role'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $kategoriBerita = KategoriBerita::findOrFail($id);
        $kategoriBerita->update($validatedData);

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
        $kategoriBerita->delete();

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil dihapus.');
    }
}

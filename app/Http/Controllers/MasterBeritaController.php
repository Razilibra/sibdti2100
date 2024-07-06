<?php

namespace App\Http\Controllers;

use App\Models\MasterBerita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class MasterBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Daftar Berita";
        $role = session('role');
        $masterBeritas = MasterBerita::orderBy('tanggal_publikasi', 'desc')->paginate(10);
        $masterBeritas = MasterBerita::latest()->paginate(10);
        return view('admin.master_berita.index', compact('masterBeritas','title','role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Daftar Berita";
        $kategoriBeritas = KategoriBerita::all();
        $role = session('role');
        return view('admin.master_berita.create', compact('kategoriBeritas','title','role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'kategori_berita_id' => 'required|exists:kategori_berita,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_publikasi' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $fileName);
            $data['gambar'] = $fileName;
        }

        MasterBerita::create($data);

        return redirect()->route('master-berita.index')
            ->with('success', 'Master Berita created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterBerita $masterBerita)
    {
        $title="Daftar Berita";
        $role = session('role');
        return view('admin.master_berita.show', compact('masterBerita','title','role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterBerita $masterBerita)
    {
        $title="Daftar Berita";
        $kategoriBerita = KategoriBerita::all();
        $role = session('role');
        return view('admin.master_berita.edit', compact('masterBerita', 'kategoriBerita','title','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterBerita $masterBerita)
    {

        $request->validate([
            'judul' => 'required|max:50',
            'kategori_berita_id' => 'required|exists:kategori_berita,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_publikasi' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($masterBerita->gambar && file_exists(public_path('images').'/'.$masterBerita->gambar)) {
                unlink(public_path('images').'/'.$masterBerita->gambar);
            }

            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $fileName);
            $data['gambar'] = $fileName;
        }

        $masterBerita->update($data);

        return redirect()->route('master-berita.index')
            ->with('success', 'Master Berita updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete the image file if it exists
        $masterBerita=masterberita::find($id);
        if ($masterBerita->gambar && file_exists(public_path('/images').'/'.$masterBerita->gambar)) {
            unlink(public_path('/images').'/'.$masterBerita->gambar);
        }
        $hapus=$masterBerita->delete();
        if(!$hapus){
            return redirect()->route('master-berita.index')
           ->with('success', 'Master Berita deleted successfully');
        }
    return redirect()->route('master-berita.index')
        ->with('failed', 'Master Berita deleted successfully');
        }

}

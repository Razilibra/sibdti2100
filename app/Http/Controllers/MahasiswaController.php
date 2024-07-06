<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Daftar Mahasiswa";
        $mahasiswa = Mahasiswa::all();
        $role = session('role');

        return view('admin.mahasiswa.index', compact('mahasiswa','title','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Daftar Mahasiswa";
        $user = User::all();
        $role = session('role');
        return view('admin.mahasiswa.create', compact('user','title','role'));
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
            'nim' => 'required|unique:mahasiswa',
            'program_studi' => 'required',
            'angkatan' => 'required|integer',
            'ipk' => 'required|numeric|between:0,4.00',
            'id_user'=>'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index') ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $title="Daftar Mahasiswa";
        $role = session('role');
        return view('admin.mahasiswa.show', compact('mahasiswa','title','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $title="Daftar Mahasiswa";
        $mahasiswa = Mahasiswa::findOrFail($id);
        $user = User::all(); // Ambil semua data user untuk dropdown nama
        $role = session('role');
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'user','title','role'));
    }

    /**
     * Menyimpan perubahan pada data mahasiswa yang sudah diedit.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:255',
            'id_user' => 'required|exists:user,id',
            'program_studi' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'ipk' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->id_user = $request->id_user;
        $mahasiswa->program_studi = $request->program_studi;
        $mahasiswa->angkatan = $request->angkatan;
        $mahasiswa->ipk = $request->ipk;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')    ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}

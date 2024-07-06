<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {

        $title="Daftar Dosen";
        $role = session('role');
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen','title','role'));
    }

    public function create()
    {
        $title="Daftar Dosen";
        $user = User::all();
        $role = session('role');
        return view('admin.dosen.create', compact('user','title','role'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nip' => 'required|unique:dosen',
            'id_user' => 'required',  // Ensure id_user exists in users table
            'jabatan_akademik' => 'required|max:50',
            'no_telepon' => 'required|max:20',
            'email' => 'required|max:100|email',
            'foto' => 'required|max:255',
        ]);

        Dosen::create($request->all());
        return redirect()->route('dosen.index')->with('success', 'Dosen created successfully.');
    }

    public function show(Dosen $dosen)
    {
        $title="Daftar Dosen";
        $role = session('role');
        return view('admin.dosen.show', compact('dosen','title','role'));
    }

    public function edit(Dosen $dosen)
    {
        $title="Daftar Dosen";
        $role = session('role');
        return view('admin.dosen.edit', compact('dosen','title','role'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nip' => 'required|unique:dosen',
            'id_user' => 'required',  // Ensure id_user exists in users table
            'jabatan_akademik' => 'required|max:50',
            'no_telepon' => 'required|max:20',
            'email' => 'required|max:100|email',
            'foto' => 'required|max:255',
        ]);

        $dosen->update($request->all());
        return redirect()->route('dosen.index')->with('success', 'Dosen updated successfully.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen deleted successfully.');
    }
}

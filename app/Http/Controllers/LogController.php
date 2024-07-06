<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $title="Daftar Log";
        $logs = Log::with('user')->paginate(10);
        $role = session('role');
        return view('admin.log.index', compact('logs','title','role'));
    }

    public function create()
    {
        $title="Daftar Log";
        $role = session('role');
        return view('admin.log.create',compact("title",'role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'tipe_aktivitas' => 'required',
            'tabel_terkait' => 'required',
            'data_sebelum' => 'nullable',
            'data_sesudah' => 'nullable',
        ]);

        Log::create($request->all());

        return redirect()->route('logs.index')->with('success', 'Log created successfully.');
    }

    public function show($id)
    {
        $title="Daftar Log";
        $role = session('role');
        $log = Log::findOrFail($id);
        return view('admin.log.show', compact('log','title','role'));
    }

    public function edit($id)
    {
        $title="Daftar Log";
        $log = Log::findOrFail($id);
        $role = session('role');
        return view('admin.log.edit', compact('log', 'title','role'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required',
            'tipe_aktivitas' => 'required',
            'tabel_terkait' => 'required',
            'data_sebelum' => 'nullable',
            'data_sesudah' => 'nullable',
        ]);

        $log = Log::findOrFail($id);
        $log->update($request->all());

        return redirect()->route('logs.index')->with('success', 'Log updated successfully.');
    }

    public function destroy($id)
    {
        $log = Log::findOrFail($id);
        $log->delete();

        return redirect()->route('logs.index')->with('success', 'Log deleted successfully.');
    }
}

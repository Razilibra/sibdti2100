<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Daftar User";
        $user = User::all();
        $role = session('role');
        return view('admin.user.index', compact('user','title','role'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new UsersImport, $request->file('file')->store('temp'));

        return back()->with('success', 'Users imported successfully.');
    }
    public function create()
    {
        $title="Daftar User";
        $role = session('role');
        return view('admin.user.create',compact('title','role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email',
            'role' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $title="Daftar User";
        $role = session('role');
        return view('admin.user.show', compact('user','title','role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title="Daftar User";
        $role = session('role');
        return view('admin.user.edit', compact('user','title','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email,' . $user->id,
            'role' => 'required|integer',
            'password' => 'nullable|string|min:8',
        ]);

        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
    // public function exportExcel()
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }
}

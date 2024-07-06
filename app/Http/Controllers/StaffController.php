<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $title="Daftar Staff";
        $staff = Staff::all();
        $role = session('role');
        return view('admin.staff.index', compact('staff','title','role'));
    }

    public function create()
    {
        $title="Daftar Staff";
        $user = User::all();
        $role = session('role');
        return view('admin.staff.create', compact('user','title','role'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required|unique:staff',
            'id_user' => 'required', // Assuming id_user should exist in the users table
            'jabatan_akademik' => 'required|string|max:50',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|string|max:100|email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Staff::create($request->all());

        return redirect()->route('staff.index')
                         ->with('success', 'Staff created successfully.');
    }

    public function show(Staff $staff)
    {

        $title="Daftar Staff";
        $role = session('role');
        return view('admin.staff.show', compact('staff','title','role'));
    }

    public function edit(Staff $staff)
    {
        $title="Daftar Staff";
        $users = User::all();
        $role = session('role');
        return view('admin.staff.edit', compact('staff', 'users','title','role'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'nik' => 'required|unique:staff',
           'id_user' => 'required',
            'jabatan_akademik' => 'required|string|max:50',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|string|max:100|email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index')
                         ->with('success', 'Staff updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')
                         ->with('success', 'Staff deleted successfully.');
    }
}

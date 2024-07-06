<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Daftar Supplier";
        $supplier = Supplier::all();
        $role = session('role');
        return view('admin.supplier.index', compact('supplier','title','role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Daftar Supplier";
        $role = session('role');
        return view('admin.supplier.create',compact('title','role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $Suppliers)
    {
        $Suppliers->validate([
            'nama_supplier' => 'required|string|max:255',
            'telepon_supplier' => 'required|string|max:15',
        ]);

        Supplier::create($Suppliers->all());
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $title="Daftar Supplier";
        $role = session('role');
        return view('admin.supplier.show', compact('supplier','title','role'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
{
    $title="Daftar Supplier";
    $role = session('role');
    return view('admin.supplier.edit', compact('supplier','title','role'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
{
    $request->validate([
        'nama_supplier' => 'required|string|max:255',
        'telepon_supplier' => 'required|string|max:15',
    ]);

    $supplier->update($request->all());

    return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $Suppliers)
    {
        $Suppliers->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}

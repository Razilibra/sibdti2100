<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\MasterBerita; // Import the correct model

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data jumlah barang berdasarkan status
        $count1 = Barang::where('status', 1)->sum('stok');
        $count2 = Barang::where('status', 2)->sum('stok');
        $count3 = Barang::where('status', 3)->sum('stok');
        $count4 = Barang::where('status', 4)->sum('stok');

        // Ambil data berita terbaru
        $masterBeritas = masterBerita::latest()->take(5)->get();

        // Data lain yang mungkin diperlukan untuk statistik
        $role = session('role');
        $title = "Dashboard " . $role;

        return view('admin.dashboard.index', compact('count1', 'count2', 'count3', 'count4', 'role', 'title', 'masterBeritas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

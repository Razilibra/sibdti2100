<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Logika untuk menampilkan dashboard admin
        return view('admin.dashboard'); // Mengembalikan tampilan admin.dashboard
    }

    // Metode lain untuk rute-rute admin lainnya dapat ditambahkan di sini
}

<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        // Fetch all Prodi records


        // Pass the data to the view
        return view('admin. prodi.index');
    }
}

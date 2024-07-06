<?php

// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Method untuk menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Method untuk menyimpan data registrasi
    public function store(Request $request)
    {
        // Validasi input termasuk reCAPTCHA

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:user',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|in:mahasiswa,dosen,staff'
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:user',
            // 'password' => 'required|string|min:8|confirmed',
            // 'g-recaptcha-response' => 'required|captcha'
        ]);


        // Membuat pengguna baru
        User::create([
            'nama' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);


        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}

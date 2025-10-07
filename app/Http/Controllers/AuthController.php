<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Function untuk menampilkan halaman login
    public function index()
    {
        return view('login');
    }

    // Function untuk memproses data login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.'
        ]);

        $username = $request->username;
        $password = $request->password;

        // Cek panjang dan huruf kapital di password
        if (strlen($password) < 3 || !preg_match('/[A-Z]/', $password)) {
            return back()->with('error', 'Password harus minimal 3 karakter dan mengandung huruf kapital.');
        }

        // Contoh user dummy (bisa kamu ganti)
        $userDB = [
            'username' => 'Dapoii',
            'password' => 'Admin123'
        ];

        // Cek kesamaan username & password
        if ($username === $userDB['username'] && $password === $userDB['password']) {
            return view('welcome-page', ['username' => $username]);
        } else {
            return back()->with('error', 'Username atau password salah.');
        }
    }
}

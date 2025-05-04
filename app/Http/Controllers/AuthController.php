<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Kirim request ke Django API
        $response = Http::post('http://localhost:8002/api/token/', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $token = $response->json()['access'];
            session(['api_token' => $token]); // Simpan token di session

            return redirect('/index'); // Redirect ke halaman index
        } else {
            return back()->withErrors([
                'login' => 'Username atau password salah.',
            ])->withInput();
        }
    }

    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Kirim data ke Django
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('http://localhost:8002/api/register/', [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            // Redirect ke halaman login setelah berhasil daftar
            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return back()->withErrors([
                'register' => 'Registrasi gagal: ' . $response->body(),
            ])->withInput();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('register');
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Register function
    public function register(Request $request)
    {
        // Validasi input form
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:100',
            'gmail' => 'required|email',
            'kontak' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengirim data ke Django API menggunakan HTTP Client Laravel
        $response = Http::post('http://127.0.0.1:8080/api/users/', [
            'username' => $request->username,
            'gmail' => $request->gmail,
            'kontak' => $request->kontak,
            'password' => $request->password,
        ]);

        // Cek apakah respons berhasil
        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
        } else {
            return redirect()->back()->with('error', 'Failed to register. Please try again.');
        }
    }

    // Login function
    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->only('username', 'password');

        // Kirim data login ke API Django menggunakan metode GET
        $queryParams = http_build_query($credentials);  // Membuat query string dari username dan password
        $response = Http::get('http://127.0.0.1:8080/api/users/?' . $queryParams);

        // Cek apakah login berhasil berdasarkan response dari Django API
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['token'])) {
                // Simpan token JWT dalam session atau localStorage jika diperlukan
                session(['token' => $data['token']]);
                return redirect()->route('profile');  // Redirect ke halaman profil setelah login berhasil
            }
        }

        // Jika login gagal, kembalikan dengan error
        return redirect()->back()->with('error', 'Invalid login credentials.');
    }
}

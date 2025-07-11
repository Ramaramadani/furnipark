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

    public function logout()
    {
        session()->flush(); // Hapus semua data sesi
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
    
    
    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->only('username', 'password');
    
        // Kirim data login ke API Django
        $response = Http::post('http://127.0.0.1:8080/api/users/login/', $credentials);
    
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['token'])) {
                // ✅ Simpan token & user info ke session
                session([
                    'token' => $data['token'],
                    'username' => $credentials['username'],
                    'is_logged_in' => true
                ]);
    
                session()->flash('success', 'Login berhasil!');
                return redirect()->route('profile');
            }
        }
    
        // Jika login gagal
        session()->flash('error', 'Invalid login credentials. Please try again.');
        return redirect()->back();
    }
    
    
}

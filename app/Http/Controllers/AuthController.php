<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://localhost:8000/api/token/', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $token = $response->json()['access'];
            session(['api_token' => $token]);
            return redirect('/index');
        } else {
            return back()->withErrors([
                'login' => 'Username atau password salah.',
            ])->withInput();
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('http://localhost:8000/api/register/', [
            'username' => $request->username,
            'gmail' => $request->email,
            'kontak' => $request->kontak,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return back()->withErrors([
                'register' => 'Registrasi gagal: ' . $response->body(),
            ])->withInput();
        }
    }
}

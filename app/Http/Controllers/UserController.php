<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        // Mengambil data dari API Django
        $response = Http::get('http://127.0.0.1:8080/api/users/');
        $users = $response->json(); // Mengonversi response menjadi array

        return view('users.index', compact('users'));
    }

    // Menghapus pengguna berdasarkan ID
    public function destroy($id)
    {
        // Menghapus pengguna dari API Django
        // Pastikan URL berakhiran dengan '/' 
        $response = Http::delete("http://127.0.0.1:8080/api/users/{$id}/"); // <-- Tambahkan trailing slash

        // Cek jika response sukses
        if ($response->successful()) {
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        }

        // Jika gagal, beri pesan error
        return redirect()->route('users.index')->with('error', 'Failed to delete user.');
    }

    // Mengupdate role pengguna
    public function updateRole(Request $request, $id)
    {
$response = Http::put("http://127.0.0.1:8080/api/users/{$id}/update-role/", [
    'role' => $request->input('role')
]);


        // Cek jika response sukses
        if ($response->successful()) {
            return redirect()->route('users.index')->with('success', 'User role updated successfully.');
        }

        // Jika gagal, beri pesan error
        return redirect()->route('users.index')->with('error', 'Failed to update user role.');
    }
}

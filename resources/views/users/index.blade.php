@extends('layouts.app') <!-- Menggunakan layout yang sudah ada -->

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <!-- Menampilkan pesan sukses atau error -->
    @if(session('success'))
        <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <!-- Header -->
    <h1 class="text-4xl font-semibold text-center text-orange-500 mb-6">Daftar Pengguna</h1>

    <!-- Tabel -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-orange-400 text-white">
                    <th class="px-6 py-4 text-left">Username</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Role</th>
                    <th class="px-6 py-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="border-t border-gray-200">
                        <td class="px-6 py-4">{{ $user['username'] }}</td>
                        <td class="px-6 py-4">{{ $user['gmail'] }}</td>
                        <td class="px-6 py-4">{{ $user['role'] }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <!-- Form untuk mengupdate role -->
                            <form action="{{ route('users.updateRole', $user['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <select name="role" required class="px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    <option value="user" {{ $user['role'] == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="cashier" {{ $user['role'] == 'cashier' ? 'selected' : '' }}>Cashier</option>
                                    <option value="owner" {{ $user['role'] == 'owner' ? 'selected' : '' }}>Owner</option>
                                </select>
                                <button type="submit" class="bg-orange-400 text-white py-2 px-4 rounded-md hover:bg-orange-500 transition duration-300">Update Role</button>
                            </form>

                            <!-- Form untuk menghapus user -->
                            <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition duration-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center px-6 py-4">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Daftar Kontak</h1>

    @isset($error)
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center">
            {{ $error }}
        </div>
    @endisset

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-left text-gray-700">
            <thead class="bg-orange-500 text-white">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Saran</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $contact['nama'] }}</td>
                        <td class="px-4 py-2">{{ $contact['email'] }}</td>
                        <td class="px-4 py-2">{{ $contact['saran'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center px-4 py-4 text-gray-500">Tidak ada data kontak.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

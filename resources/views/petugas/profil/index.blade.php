@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Profil Saya</h1>

<div class="bg-white p-8 rounded-2xl shadow max-w-3xl border border-gray-300">

    <div class="flex items-center gap-6 mb-8">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}&background=0E4C75&color=fff&size=120"
             class="w-28 h-28 rounded-full shadow">
        
        <div>
            <h2 class="text-2xl font-bold">{{ $user->nama }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
            <p class="text-sm text-blue-600 mt-1">Petugas Perpustakaan</p>
        </div>
    </div>


    <div class="grid grid-cols-2 gap-6">

        <div class="bg-gray-50 p-5 rounded-xl border">
            <h3 class="text-lg font-semibold mb-2">Informasi Dasar</h3>
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>No HP:</strong> {{ $user->no_hp ?? '—' }}</p>
            <p><strong>Dibuat:</strong> {{ $user->created_at->format('d M Y') }}</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-xl border">
            <h3 class="text-lg font-semibold mb-2">Aksi Cepat</h3>

            <a href="{{ route('petugas.profil.edit') }}"
               class="block mb-3 px-4 py-2 bg-blue-600 text-white rounded-lg text-center">
                Edit Profil
            </a>

            <a href="{{ route('petugas.profil.password') }}"
               class="block px-4 py-2 bg-gray-600 text-white rounded-lg text-center">
                Ganti Password
            </a>
        </div>

    </div>

</div>

@endsection
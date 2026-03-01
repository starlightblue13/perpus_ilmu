@extends('layouts.siswa')
@php $hideFooter = true; @endphp

@section('content')

<div class="bg-white p-10 rounded-2xl shadow-lg mx-auto max-w-xl">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">Ganti Password</h1>

    <form action="{{ route('siswa.password.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- PASSWORD LAMA -->
        <div>
            <label class="font-semibold text-gray-700">Password Lama</label>
            <input type="password" name="current_password"
                   class="w-full border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
            @error('current_password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- PASSWORD BARU -->
        <div>
            <label class="font-semibold text-gray-700">Password Baru</label>
            <input type="password" name="new_password"
                   class="w-full border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
        </div>

        <!-- KONFIRMASI -->
        <div>
            <label class="font-semibold text-gray-700">Konfirmasi Password Baru</label>
            <input type="password" name="confirm_password"
                   class="w-full border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
        </div>

        <!-- BUTTONS -->
        <div class="pt-4 space-y-3">
            <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg shadow transition">
                Simpan Password Baru
            </button>

            <a href="{{ route('siswa.profile') }}"
               class="w-full block text-center bg-gray-300 hover:bg-gray-400 py-2 rounded-lg shadow transition">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
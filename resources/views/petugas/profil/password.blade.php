@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Ganti Password</h1>

<div class="bg-white p-8 rounded-2xl max-w-3xl shadow border">

    <form action="{{ route('petugas.profil.password.update') }}" method="POST">
        @csrf

        <div class="mb-5">
            <label class="font-semibold">Password Lama</label>
            <input type="password" name="password_lama"
                   class="w-full border p-2 rounded-lg">
            @error('password_lama')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label class="font-semibold">Password Baru</label>
            <input type="password" name="password_baru"
                   class="w-full border p-2 rounded-lg">
        </div>

        <div class="mb-5">
            <label class="font-semibold">Konfirmasi Password</label>
            <input type="password" name="konfirmasi_password"
                   class="w-full border p-2 rounded-lg">
        </div>

        <div class="flex gap-4">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                Simpan
            </button>

            <a href="{{ route('petugas.profil') }}"
               class="px-6 py-2 bg-gray-400 text-white rounded-lg">
                Batal
            </a>
        </div>

    </form>
</div>

@endsection
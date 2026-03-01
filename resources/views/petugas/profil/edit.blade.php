@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Edit Profil</h1>

<div class="bg-white p-8 rounded-2xl shadow max-w-3xl border">

    <form action="{{ route('petugas.profil.update') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="font-semibold">Nama</label>
            <input type="text" name="nama" value="{{ $user->nama }}"
                   class="w-full border p-2 rounded-lg">
        </div>

        <div class="mb-4">
            <label class="font-semibold">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                   class="w-full border p-2 rounded-lg">
        </div>

        <div class="mb-4">
            <label class="font-semibold">No HP</label>
            <input type="text" name="no_hp" value="{{ $user->no_hp }}"
                   class="w-full border p-2 rounded-lg">
        </div>

        <div class="flex gap-4 pt-5">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-lg">
                Simpan
            </button>

            <a href="{{ route('petugas.profil') }}"
               class="px-6 py-2 bg-gray-400 rounded-lg text-white">
                Batal
            </a>
        </div>

    </form>
</div>

@endsection
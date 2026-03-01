@extends('layouts.siswa')
@php $hideFooter = true; @endphp

@section('content')

<div class="bg-white p-10 rounded-2xl shadow-lg mx-auto max-w-4xl">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Profil</h1>

    <div class="grid grid-cols-2 gap-10">

        <!-- FORM -->
        <form action="{{ route('siswa.profil.update') }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- NAMA -->
            <div>
                <label class="font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ $user->nama }}"
                       class="w-full border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="font-semibold text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $user->email }}"
                       class="w-full border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- NO HP -->
            <div>
                <label class="font-semibold text-gray-700">No Handphone</label>
                <input type="text" name="no_hp" value="{{ $user->no_hp }}"
                       class="w-full border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- BUTTONS -->
            <div class="flex gap-3 pt-4">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg shadow transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('siswa.profil.index') }}"
                   class="w-full text-center bg-gray-300 hover:bg-gray-400 py-2 rounded-lg shadow transition">
                    Kembali
                </a>
            </div>

        </form>

        <!-- LOGO -->
        <div class="flex items-center justify-center">
            <img src="{{ asset('images/logo2.png') }}" class="w-60 opacity-90 drop-shadow">
        </div>

    </div>

</div>

@endsection

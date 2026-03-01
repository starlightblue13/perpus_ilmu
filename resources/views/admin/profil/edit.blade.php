@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">Edit Profil</h1>

<div class="bg-white p-10 rounded-2xl shadow-lg max-w-3xl mx-auto">

    <form action="{{ route('admin.profil.update') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="font-semibold">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $user->nama }}"
                   class="w-full border px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="font-semibold">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                   class="w-full border px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="font-semibold">No Handphone</label>
            <input type="text" name="no_hp" value="{{ $user->no_hp }}"
                   class="w-full border px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="flex gap-4 pt-5">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">Simpan</button>
            <a href="{{ route('admin.profil') }}"
               class="px-6 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Kembali</a>
        </div>

    </form>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">Ganti Password</h1>

<div class="bg-white p-10 rounded-2xl shadow-lg max-w-3xl mx-auto">

    <form action="{{ route('admin.profil.password.update') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="font-semibold">Password Lama</label>
            <input type="password" name="password_lama"
                   class="w-full border px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-red-400">
        </div>

        <div>
            <label class="font-semibold">Password Baru</label>
            <input type="password" name="password_baru"
                   class="w-full border px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-green-400">
        </div>

        <div>
            <label class="font-semibold">Konfirmasi Password Baru</label>
            <input type="password" name="konfirmasi_password"
                   class="w-full border px-4 py-2 rounded-lg shadow-sm focus:ring-2 focus:ring-green-400">
        </div>

        <div class="flex gap-4 pt-5">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">Ubah Password</button>
            <a href="{{ route('admin.profil') }}"
               class="px-6 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
        </div>

    </form>

</div>

@endsection
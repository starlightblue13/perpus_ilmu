@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-8">Tambah Petugas</h1>

<form action="{{ route('admin.petugas.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="font-semibold">Nama</label>
        <input type="text" name="nama" class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label class="font-semibold">Email</label>
        <input type="email" name="email" class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label class="font-semibold">Password</label>
        <input type="password" name="password" class="border p-2 w-full">
    </div>

    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
</form>

@endsection

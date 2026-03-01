@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-8">Edit Petugas</h1>

<form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="font-semibold">Nama</label>
        <input type="text" name="nama" value="{{ $petugas->nama }}" class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label class="font-semibold">Email</label>
        <input type="email" name="email" value="{{ $petugas->email }}" class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label class="font-semibold">Password Baru (opsional)</label>
        <input type="password" name="password" class="border p-2 w-full">
    </div>

    <button class="px-4 py-2 bg-green-600 text-white rounded-lg">Perbarui</button>
</form>

@endsection

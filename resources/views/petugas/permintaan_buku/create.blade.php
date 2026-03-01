@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-6">Ajukan Penambahan Buku</h1>

<div class="bg-white p-6 shadow rounded-xl max-w-3xl">

    <form action="{{ route('petugas.buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="font-semibold">Judul Buku</label>
        <input type="text" name="judul" required class="w-full border p-2 rounded mb-4">

        <label class="font-semibold">Penulis</label>
        <input type="text" name="penulis" class="w-full border p-2 rounded mb-4">

        <label class="font-semibold">Penerbit</label>
        <input type="text" name="penerbit" class="w-full border p-2 rounded mb-4">

        <label class="font-semibold">Tahun Terbit</label>
        <input type="number" name="tahun" class="w-full border p-2 rounded mb-4">

        <label class="font-semibold">Stok</label>
        <input type="number" name="stok" class="w-full border p-2 rounded mb-4" required>

        <label class="font-semibold">Kategori</label>
        <input type="text" name="kategori" class="w-full border p-2 rounded mb-4" required>

        <label class="font-semibold">Jumlah Halaman</label>
        <input type="number" name="halaman" class="w-full border p-2 rounded mb-4" required>

        <label class="font-semibold">Deskripsi Buku</label>
        <textarea name="deskripsi" class="w-full border p-2 rounded mb-4" rows="4" required></textarea>

        <label class="font-semibold">Upload Cover (optional)</label>
        <input type="file" name="cover" class="w-full border p-2 rounded mb-4">

        <label class="font-semibold">Alasan Penambahan Buku</label>
        <textarea name="alasan" class="w-full border p-2 rounded mb-4" rows="4" required></textarea>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">Ajukan</button>
    </form>

</div>

@endsection

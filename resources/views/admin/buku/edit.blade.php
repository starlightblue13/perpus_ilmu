@extends('layouts.no-sidebar')

@section('content')

<h1 class="text-3xl font-bold mb-8">Edit Permintaan Buku</h1>

<div class="bg-white p-8 rounded-xl shadow max-w-4xl mx-auto border">

<form action="{{ route('petugas.buku.update', $permintaan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-2 gap-6">

        <!-- ==================== KOLOM KIRI ==================== -->
        <div>

            <label class="font-semibold">Judul Buku:</label>
            <input type="text" name="judul" value="{{ $permintaan->judul }}"
                   class="w-full p-3 border rounded-lg" required>

            <label class="font-semibold mt-3 block">Penulis:</label>
            <input type="text" name="penulis" value="{{ $permintaan->penulis }}"
                   class="w-full p-3 border rounded-lg">

            <label class="font-semibold mt-3 block">Penerbit:</label>
            <input type="text" name="penerbit" value="{{ $permintaan->penerbit }}"
                   class="w-full p-3 border rounded-lg">

            <label class="font-semibold mt-3 block">Tahun Terbit:</label>
            <input type="number" name="tahun" value="{{ $permintaan->tahun }}"
                   class="w-full p-3 border rounded-lg">

            <label class="font-semibold mt-3 block">Stok:</label>
            <input type="number" name="stok" value="{{ $permintaan->stok }}"
                   class="w-full p-3 border rounded-lg">
        </div>

        <!-- ==================== KOLOM KANAN ==================== -->
        <div>

            <label class="font-semibold">Kategori:</label>
            <input type="text" name="kategori" value="{{ $permintaan->kategori }}"
                   class="w-full p-3 border rounded-lg">

            <label class="font-semibold mt-3 block">Jumlah Halaman:</label>
            <input type="number" name="halaman" value="{{ $permintaan->halaman }}"
                   class="w-full p-3 border rounded-lg">

            <label class="font-semibold mt-3 block">Cover Saat Ini:</label>
            @if($permintaan->cover)
                <img src="{{ asset('cover_temp/'.$permintaan->cover) }}" class="w-24 h-32 object-cover rounded mb-3">
            @endif

            <label class="font-semibold block">Ganti Cover:</label>
            <input type="file" name="cover" class="w-full p-3 border rounded-lg">

            <label class="font-semibold mt-3 block">Alasan Penambahan Buku:</label>
            <textarea name="alasan" rows="4"
                      class="w-full p-3 border rounded-lg">{{ $permintaan->alasan }}</textarea>

        </div>

    </div>

    <div class="flex justify-center mt-10 gap-4">
        <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Simpan Perubahan
        </button>

        <a href="{{ route('petugas.buku.index') }}"
           class="px-6 py-2 bg-gray-300 rounded-lg">Batal</a>
    </div>

</form>

</div>

@endsection
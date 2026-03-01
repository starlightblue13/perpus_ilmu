@extends('layouts.petugas')

@section('content')
<h1 class="text-3xl font-bold mb-6">Data Buku</h1>

<!-- TOMBOL CETAK PDF -->
<a href="{{ route('petugas.laporan.cetak') }}"
   class="px-4 py-2 bg-red-600 text-white rounded mb-5 inline-block">
   Cetak PDF
</a>

<!-- BUTTON TAMBAH -->
<a href="{{ route('petugas.buku.tambah') }}"
    class="inline-block mb-6 px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
    + Tambah Buku
</a>

<!-- TAB MENU -->
@include('petugas.buku.tab')

<!-- TABEL DATA BUKU -->
<div class="bg-white p-6 rounded-xl shadow-lg border mt-6">

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-blue-200">
                <th class="border p-3">Gambar</th>
                <th class="border p-3">Judul</th>
                <th class="border p-3">Penulis</th>
                <th class="border p-3">Kategori</th>
                <th class="border p-3">Stok</th>
                <th class="border p-3">Status</th> <!-- Tambahan -->
            </tr>
        </thead>

        <tbody>
            @foreach ($buku as $b)
                <tr class="hover:bg-blue-50">
                    <td class="p-3 border">
                        @if ($b->gambar)
                            <img src="{{ asset('cover_buku/' . $b->gambar) }}" class="w-16 h-20 object-cover rounded">
                        @else
                            <span class="text-gray-400">Tidak ada</span>
                        @endif
                    </td>

                    <td class="p-3 border">{{ $b->judul }}</td>
                    <td class="p-3 border">{{ $b->penulis }}</td>
                    <td class="p-3 border">{{ $b->kategori->nama ?? '-' }}</td>
                    <td class="p-3 border">{{ $b->stok }}</td>

                    <!-- STATUS -->
                    <td class="p-3 border font-semibold">
    @if($b->petugas_id)
        <span class="text-blue-600">Ditambahkan oleh Petugas</span>
    @else
        <span class="text-green-600">Ditambahkan oleh Admin</span>
    @endif
</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

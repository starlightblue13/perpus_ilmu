@extends('layouts.siswa')
@php $hideFooter = true; @endphp
@section('content')

<div class="bg-[#F3F6F9] p-10 rounded-xl shadow">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">Kartu Peminjaman Buku</h1>

    <div class="grid grid-cols-2 gap-10">

        <!-- Kiri -->
        <div class="space-y-4">
            <p><strong>Nama Peminjam :</strong> {{ $data->user->nama }}</p>
            <p><strong>Email :</strong> {{ $data->user->email }}</p>
            <p><strong>Nama Buku :</strong> {{ $data->buku->judul }}</p>
        </div>

        <!-- Kanan -->
        <div class="space-y-4">
            <p><strong>Tanggal Peminjaman :</strong> {{ $data->tanggal_pinjam }}</p>
            <p><strong>Tanggal Pengembalian :</strong> {{ $data->tanggal_kembali }}</p>
            <p><strong>Kategori :</strong> {{ $data->buku->kategori->nama }}</p>
            <p><strong>Catatan :</strong>
                Silakan tunjukkan kartu ini kepada petugas perpustakaan untuk mengambil buku.
            </p>
        </div>
    </div>

    <a href="{{ url()->previous() }}">
        <button class="mt-10 px-10 py-3 bg-gray-300 rounded-lg shadow hover:bg-gray-400">
            Kembali
        </button>
    </a>

</div>

@endsection
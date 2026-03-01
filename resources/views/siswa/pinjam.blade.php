@extends('layouts.siswa')
@php $hideFooter = true; @endphp
@section('content')

<h1 class="text-3xl font-bold mb-6">Ajukan Peminjaman Buku</h1>

<div class="bg-[#F3F6F9] p-10 rounded-xl shadow">

    <h2 class="text-2xl font-bold text-blue-700 mb-6">Kartu Peminjaman Buku</h2>

    <div class="grid grid-cols-2 gap-10">

        <!-- KIRI -->
        <div class="space-y-3">
            
            <p><strong>Nama :</strong> {{ $user->nama }}</p>

            <p><strong>Email :</strong> {{ $user->email }}</p>

            <p><strong>Nama Buku :</strong> {{ $buku->judul }}</p>

        </div>

        <!-- KANAN -->
        <div class="space-y-3">

            <p><strong>Tanggal Peminjaman :</strong> {{ $tanggal_pinjam }}</p>

            <p><strong>Tanggal Pengembalian :</strong> {{ $tanggal_kembali }}</p>

            <p><strong>Kategori :</strong> {{ $buku->kategori->nama }}</p>

        </div>

    </div>

    <div class="flex justify-center gap-6 mt-10">

        <!-- Kembali ke halaman detail -->
        <a href="{{ route('siswa.buku.detail', $buku->id) }}"
           class="px-10 py-3 bg-gray-300 rounded-lg shadow hover:bg-gray-400">
            Kembali
        </a>

        <!-- Tombol Ajukan -->
        <form action="{{ route('siswa.buku.ajukan', $buku->id) }}" method="POST">
    @csrf
    <button class="px-10 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
        Ajukan
    </button>
</form>

    </div>

</div>

<p class="text-center text-xs mt-4 italic">
    Buku diambil langsung di perpustakaan setelah disetujui.
</p>

@endsection
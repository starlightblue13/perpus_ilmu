@extends('layouts.siswa')
@php $hideFooter = true; @endphp
@section('content')

<h1 class="text-3xl font-bold mb-6">Detail Buku</h1>

<div class="bg-[#F3F6F9] p-10 rounded-xl shadow">

    <div class="grid grid-cols-3 gap-10">

        <!-- COVER -->
        <div>
            <img src="{{ asset('cover_buku/' . $buku->gambar) }}"
                 class="w-full h-[380px] object-cover rounded-xl shadow-lg">
        </div>

        <!-- DETAIL INFORMASI -->
        <div class="col-span-2 space-y-4">

            <h2 class="text-3xl font-bold">{{ $buku->judul }}</h2>

            <p class="text-gray-700 leading-relaxed">
                {{ $buku->deskripsi }}
            </p>

            <div class="grid grid-cols-2 gap-4 mt-4 text-sm">

                <p><strong>Penulis :</strong> {{ $buku->penulis }}</p>
                <p><strong>Penerbit :</strong> {{ $buku->penerbit }}</p>

                <p><strong>Kategori :</strong> {{ $buku->kategori->nama }}</p>
                <p><strong>Status :</strong> Tersedia</p>

                <p><strong>Tahun :</strong> {{ $buku->tahun_terbit }}</p>
                <p><strong>Jumlah Halaman :</strong> {{ $buku->halaman }} Halaman</p>

                <p><strong>Stok :</strong> {{ $buku->stok }}</p>

            </div>

            <a href="{{ url()->previous() }}"
             class="px-10 py-3 bg-gray-300 rounded-lg shadow hover:bg-gray-400">
              Kembali
            </a>

            <a href="{{ route('siswa.buku.pinjam', $buku->id) }}">
            <button class="mt-5 px-10 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
              Pinjam
            </button>
            </a>

        </div>

    </div>

</div>

<p class="text-center text-xs mt-4 italic">
    Buku diambil langsung di perpustakaan setelah disetujui.
</p>

@endsection
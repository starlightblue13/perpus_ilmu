@extends('layouts.siswa')

@section('content')

<!-- ================= FILTER ================= -->
<div class="flex gap-4 mb-10 items-center">

    <a href="{{ route('siswa.katalog') }}"
       class="px-6 py-2 border rounded-full bg-white shadow hover:bg-gray-200 transition">
        Semua
    </a>

    <a href="{{ route('siswa.katalog', ['kategori' => 'Non Fiksi']) }}"
       class="px-6 py-2 border rounded-full bg-white shadow hover:bg-gray-200 transition">
        Non Fiksi
    </a>

    <a href="{{ route('siswa.katalog', ['kategori' => 'Fiksi']) }}"
       class="px-6 py-2 border rounded-full bg-white shadow hover:bg-gray-200 transition">
        Fiksi
    </a>

    <!-- SEARCH -->
    <form action="{{ route('siswa.katalog') }}" method="GET" class="ml-auto">
        <input 
            type="text"
            name="search"
            placeholder="Telusuri Buku..."
            class="border border-gray-300 rounded-full px-5 py-2 w-72 shadow-sm 
                   focus:ring-2 focus:ring-blue-300 outline-none transition">
    </form>

</div>

<!-- ================= TITLE ================= -->
<h1 class="text-3xl font-bold mb-8">Selamat Datang di Gerbang Ilmu Digital</h1>



<!-- ================= HERO 1 ================= -->
<div class="grid grid-cols-2 gap-10 mb-20">

    <!-- LEFT BUBBLE -->
    <div class="bg-[#0E4C75] text-white px-10 py-8 rounded-2xl shadow leading-relaxed">
        Gerbang Ilmu Digital merupakan sistem perpustakaan digital berbasis perantara 
        yang membantu pengguna mencari buku dan mengelola peminjaman secara terstruktur 
        tanpa membaca buku secara online.
    </div>

    <!-- RIGHT ICON -->
    <div class="flex items-center justify-center">
        <img src="{{ asset('images/booksiswa.png') }}" 
             class="h-[150px] object-contain opacity-100 drop-shadow">
    </div>

</div>




<!-- ================= HERO 2 ================= -->
<div class="grid grid-cols-2 gap-10 mb-20">

    <!-- LEFT LOGO -->
    <div class="flex items-center justify-center">
        <img src="{{ asset('images/logo2.png') }}" 
             class="h-[165px] object-contain opacity-95">
    </div>

    <!-- RIGHT BUBBLE -->
    <div class="bg-[#0E4C75] text-white px-20 py-8 rounded-2xl shadow leading-relaxed">
        Gerbang Ilmu Digital hadir sebagai perantara menuju ilmu pengetahuan, 
        memudahkan pengguna menemukan buku dan melakukan peminjaman langsung 
        di perpustakaan. Sistem perpustakaan digital sebagai perantara 
        pencarian buku dan peminjaman langsung.
    </div>

</div>




<!-- ================= REKOMENDASI ================= -->
<h2 class="text-2xl font-bold mb-6">Rekomendasi</h2>

<div class="grid grid-cols-5 gap-6 mb-10">

    @foreach($buku as $item)
    <a href="{{ route('siswa.buku.detail', $item->id) }}" 
       class="block bg-white p-4 rounded-xl shadow hover:-translate-y-2 hover:shadow-xl transition transform">

        <img src="{{ asset('cover_buku/' . $item->gambar) }}"
             class="w-full h-60 object-cover rounded-lg shadow mb-3"
             alt="cover">

        <p class="font-semibold text-sm line-clamp-2 h-10">
            {{ $item->judul }}
        </p>

        <p class="text-xs text-gray-500 mt-1">
            {{ $item->penulis }}
        </p>

    </a>
    @endforeach

</div>

<a href="{{ route('siswa.katalog') }}">
    <button class="w-full py-3 rounded-full bg-white border shadow hover:bg-gray-200 transition">
        Lihat Lebih Banyak
    </button>
</a>

@endsection
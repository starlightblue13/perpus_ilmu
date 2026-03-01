@extends('layouts.siswa')

@section('content')

<!-- ================= FILTER ================= -->
<div class="flex gap-4 mb-10">

    <!-- SEMUA -->
    <a href="{{ route('siswa.katalog') }}">
        <button class="px-6 py-2 border rounded-full bg-white shadow hover:bg-gray-200 transition">
            Semua
        </button>
    </a>

    <!-- NON FIKSI -->
    <a href="{{ route('siswa.katalog', ['kategori' => 'Non Fiksi']) }}">
        <button class="px-6 py-2 border rounded-full bg-white shadow hover:bg-gray-200 transition">
            Non Fiksi
        </button>
    </a>

    <!-- FIKSI -->
    <a href="{{ route('siswa.katalog', ['kategori' => 'Fiksi']) }}">
        <button class="px-6 py-2 border rounded-full bg-white shadow hover:bg-gray-200 transition">
            Fiksi
        </button>
    </a>

    <!-- SEARCH -->
    <form action="{{ route('siswa.katalog') }}" method="GET" class="ml-auto">
        <input 
            type="text"
            name="search"
            placeholder="Telusuri Buku..."
            class="border border-gray-300 rounded-full px-5 py-2 w-72 shadow-sm 
                   focus:ring-2 focus:ring-blue-300 outline-none transition"
            value="{{ request('search') }}">
    </form>
</div>


<!-- ================= TITLE ================= -->
<h1 class="text-3xl font-bold mb-8">Katalog Buku</h1>

@if ($search)
<p class="text-gray-600 mb-3">
    Hasil pencarian untuk: <strong>"{{ $search }}"</strong>
</p>
@endif

@if ($kategori)
<p class="text-gray-600 mb-3">
    Filter kategori: <strong>{{ $kategori }}</strong>
</p>
@endif


<!-- ================= LIST BUKU ================= -->
<div class="grid grid-cols-6 gap-6">

    @foreach($buku as $item)
    <a href="{{ route('siswa.buku.detail', $item->id) }}"
       class="bg-white p-4 rounded-xl shadow hover:-translate-y-1 hover:shadow-lg transition block">

        <img src="{{ asset('cover_buku/' . $item->gambar) }}"
             class="w-full h-56 object-cover rounded-lg shadow mb-3">

        <p class="font-semibold text-sm line-clamp-2 h-10">
            {{ $item->judul }}
        </p>

        <p class="text-xs text-gray-500">
            {{ $item->penulis }}
        </p>

    </a>
    @endforeach

</div>

@endsection
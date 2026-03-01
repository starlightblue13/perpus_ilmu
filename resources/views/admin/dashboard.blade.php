@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-extrabold mb-10">Dashboard</h1>

<!-- CARD STATISTIK -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10">
    
    <!-- Buku Dipinjam -->
    <div class="bg-white p-5 rounded-xl shadow-md border hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-sm text-gray-500 font-medium">Buku Dipinjam</h2>
                <p class="text-3xl font-bold mt-2">{{ $bukuDipinjam }}</p>
            </div>
            <i class="fa-solid fa-book-reader text-4xl text-gray-400"></i>
        </div>
    </div>

    <!-- Pending -->
    <div class="bg-white p-5 rounded-xl shadow-md border hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-sm text-gray-500 font-medium">Permintaan Pending</h2>
                <p class="text-3xl font-bold mt-2">{{ $pending }}</p>
            </div>
            <i class="fa-solid fa-hourglass-half text-4xl text-gray-400"></i>
        </div>
    </div>

    <!-- Total Pengguna -->
    <div class="bg-white p-5 rounded-xl shadow-md border hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-sm text-gray-500 font-medium">Total Pengguna</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalPengguna }}</p>
            </div>
            <i class="fa-solid fa-users text-3xl text-gray-400"></i>
        </div>
    </div>

    <!-- Total Petugas -->
    <div class="bg-white p-5 rounded-xl shadow-md border hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-sm text-gray-500 font-medium">Total Petugas</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalPetugas }}</p>
            </div>
            <i class="fa-solid fa-user-tie text-3xl text-gray-400"></i>
        </div>
    </div>

    <!-- Total Buku -->
    <div class="bg-white p-5 rounded-xl shadow-md border hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-sm text-gray-500 font-medium">Total Buku</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalBuku }}</p>
            </div>
            <i class="fa-solid fa-book text-4xl text-gray-400"></i>
        </div>
    </div>

</div>


<!-- AKTIVITAS TERBARU -->
<h2 class="text-3xl font-bold mb-4">Aktivitas Terbaru</h2>

<div class="space-y-4">

    @forelse ($aktivitas as $a)
    <div class="bg-white p-4 rounded-xl shadow flex gap-4 items-center border">

        <!-- COVER -->
        <img src="{{ asset('cover_buku/' . $a->buku->gambar) }}" 
             class="w-20 h-24 object-cover rounded">

        <div class="flex-1">
            <h3 class="font-bold text-lg">{{ $a->buku->judul }}</h3>

            <p class="text-sm text-gray-600 mt-1">
                <strong>{{ $a->user->nama }}</strong>

                @switch($a->status)
                    @case('Pending')
                        mengajukan peminjaman
                        @break

                    @case('Disetujui')
                        disetujui petugas
                        @break

                    @case('Ditolak')
                        <span class="text-red-600 font-semibold">ditolak petugas</span>
                        @break

                    @case('Dipinjam')
                        sedang meminjam buku
                        @break

                    @case('Dikembalikan')
                        telah mengembalikan buku
                        @break
                @endswitch
            </p>

            <p class="text-xs text-gray-500 mt-1">
                {{ $a->created_at->format('d M Y · H:i') }}
            </p>
        </div>

    </div>
    @empty
        <p class="text-gray-500 text-center">Belum ada aktivitas terbaru.</p>
    @endforelse

</div>

@endsection
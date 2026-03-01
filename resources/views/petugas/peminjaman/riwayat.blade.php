@extends('layouts.petugas')

@section('content')

{{-- JUDUL HALAMAN --}}

<div class="mb-10">
    <h1 class="text-3xl font-bold">Laporan Peminjaman</h1>
    <p class="text-gray-600">Laporan peminjaman buku</p>
</div>

{{-- TOMBOL CETAK --}}

<div class="flex justify-end mb-4">
    <a href="{{ route('petugas.laporan.cetak') }}"
       class="px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
        Cetak Laporan
    </a>
</div>

{{-- TAB NAVIGASI --}}
@include('petugas.peminjaman.tab')

{{-- BOX TABEL --}}

<div class="bg-white p-6 rounded-xl shadow">

```
<h2 class="text-xl font-semibold mb-4">Laporan Peminjaman</h2>

<table class="w-full border-collapse">
    <thead>
        <tr class="bg-[#8ec1d6] text-white">
            <th class="px-4 py-2 text-left">No</th>
            <th class="px-4 py-2 text-left">Nama Peminjam</th>
            <th class="px-4 py-2 text-left">Judul Buku</th>
            <th class="px-4 py-2 text-left">Tanggal Pinjam</th>
            <th class="px-4 py-2 text-left">Tanggal Kembali</th>
            <th class="px-4 py-2 text-left">Status</th>
            <th class="px-4 py-2 text-left">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $item)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $item->user->name }}</td>
                <td class="px-4 py-2">{{ $item->buku->judul }}</td>

                {{-- TANGGAL PINJAM --}}
                <td class="px-4 py-2">
                    {{ $item->tanggal_pinjam ?? '-' }}
                </td>

                {{-- TANGGAL KEMBALI --}}
                <td class="px-4 py-2">
                    {{ $item->tanggal_kembali ?? '-' }}
                </td>

                {{-- BADGE STATUS --}}
                <td class="px-4 py-2">
                    @if($item->status == 'Dikembalikan')
                        <span class="px-3 py-1 rounded-full bg-green-500 text-white text-sm">
                            {{ $item->status }}
                        </span>
                    @elseif($item->status == 'Dipinjam')
                        <span class="px-3 py-1 rounded-full bg-blue-600 text-white text-sm">
                            {{ $item->status }}
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-full bg-gray-400 text-white text-sm">
                            {{ $item->status }}
                        </span>
                    @endif
                </td>

                {{-- AKSI --}}
                <td class="px-4 py-2">
                    <a href="#" class="px-3 py-1 bg-gray-200 rounded">Detail</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
```

</div>

@endsection

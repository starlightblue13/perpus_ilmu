@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-6">Pengajuan Buku – Pending</h1>

@include('petugas.buku.tab')

<div class="bg-white p-6 rounded-xl shadow-lg border mt-6">

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-yellow-200">
                <th class="border p-3">Judul</th>
                <th class="border p-3">Penulis</th>
                <th class="border p-3">Kategori</th>
                <th class="border p-3">Stok</th>
                <th class="border p-3">Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($buku as $b)
            <tr class="hover:bg-yellow-50">
                <td class="border p-3">{{ $b->judul }}</td>
                <td class="border p-3">{{ $b->penulis ?? '-' }}</td>
                <td class="border p-3"> {{ $b->kategori->nama ?? '-' }}</td>
                <td class="border p-3">{{ $b->stok }}</td>
                <td class="border p-3 text-yellow-700 font-semibold">Pending...</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500">
                    Belum ada pengajuan buku pending.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection

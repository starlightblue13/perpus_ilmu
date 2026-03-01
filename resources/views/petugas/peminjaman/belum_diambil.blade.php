@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-6">Buku Belum Diambil</h1>
@include('petugas.peminjaman.tab')
<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Tanggal Setujui</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach($data as $p)
            <tr class="bg-blue-50">
                <td class="p-3 border">{{ $p->user->nama }}</td>
                <td class="p-3 border">{{ $p->buku->judul }}</td>
                <td class="p-3 border">{{ $p->tanggal_pinjam }}</td>

                <td class="p-3 border">
                    <a href="?konfirmasi={{ $p->id }}"
                       class="px-4 py-1 bg-green-600 text-white rounded">
                        Buku sudah diambil
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>

{{-- POPUP TANPA JS --}}
@if(request('konfirmasi'))
@php
    $item = $data->firstWhere('id', request('konfirmasi'));
@endphp

<div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white p-8 rounded-xl shadow-lg w-[400px] text-center">
        <h2 class="text-xl font-bold mb-4">Konfirmasi</h2>

        <p>Apakah buku <strong>{{ $item->buku->judul }}</strong> sudah diambil?</p>

        <div class="mt-6 flex justify-center gap-3">
            <form method="POST" action="{{ route('petugas.peminjaman.diambil', $item->id) }}">
                @csrf
                <button class="px-5 py-2 rounded bg-green-600 text-white">
                    Ya, Sudah
                </button>
            </form>

            <a href="{{ route('petugas.peminjaman.belum_diambil') }}"
               class="px-5 py-2 rounded bg-gray-400 text-white">
               Batal
            </a>
        </div>
    </div>

</div>
@endif

@endsection
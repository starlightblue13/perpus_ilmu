@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Peminjaman Buku</h1>

@include('petugas.peminjaman.tab')

<h2 class="text-2xl font-bold mb-5">Tab : Ditolak</h2>

<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Tanggal Ajukan</th>
                <th class="p-3 border">Alasan</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $p)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">

                <td class="p-3 border">{{ $p->user->nama }}</td>
                <td class="p-3 border">{{ $p->buku->judul }}</td>
                <td class="p-3 border">{{ $p->tanggal_pinjam }}</td>

                <!-- Kolom alasan yang benar -->
                <td class="p-3 border text-red-600 font-semibold">
                    {{ $p->alasan_tolak }}
                </td>

                <!-- Tidak ada tombol -->
                <td class="p-3 border text-red-700 font-bold">
                    Ditolak
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
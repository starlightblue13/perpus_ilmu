@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Peminjaman Buku</h1>

@include('petugas.peminjaman.tab')

<h2 class="text-2xl font-bold mb-5">Tab : Dikembalikan</h2>

<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Tanggal Pinjam</th>
                <th class="p-3 border">Tanggal Kembali</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $p)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">
                <td class="p-3 border">{{ $p->user->nama }}</td>
                <td class="p-3 border">{{ $p->buku->judul }}</td>
                <td class="p-3 border">{{ $p->tanggal_pinjam }}</td>
                <td class="p-3 border">{{ $p->tanggal_kembali }}</td>

                <td class="p-3 border font-semibold">
                    {{ $p->status }}
                </td>

                <td class="p-3 border">

                @if($p->status == 'Dikembalikan')
    <form action="{{ route('petugas.peminjaman.hapus', $p->id) }}" 
          method="POST"
          onsubmit="return confirm('Hapus riwayat peminjaman ini?')">
        @csrf
        @method('DELETE')

        <button class="px-4 py-1 bg-red-600 text-white rounded">
            Hapus
        </button>
    </form>

@endif

                    @if($p->status == 'Belum Diterima')
                        <a href="?terima={{ $p->id }}"
                           class="px-4 py-1 bg-blue-500 text-white rounded">
                           Terima Buku
                        </a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


{{-- ======================== POPUP TERIMA BUKU ========================== --}}
@if($terimaId)
<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">

    <div class="bg-white w-[430px] p-8 rounded-2xl shadow-2xl text-center">

        <h2 class="text-2xl font-bold mb-3">Terima Buku?</h2>

        <p class="text-gray-600 mb-6">
            Pastikan buku sudah diterima secara fisik.
        </p>

        <form action="{{ route('petugas.peminjaman.terima', $terimaId) }}" method="POST">
            @csrf
            <button class="px-6 py-2 bg-green-600 text-white rounded-lg">
                Ya, sudah diterima
            </button>
        </form>

        <a href="{{ route('petugas.peminjaman.dikembalikan') }}"
           class="mt-4 inline-block px-6 py-2 bg-red-500 text-white rounded-lg">
            batal
        </a>

    </div>

</div>
@endif

@endsection
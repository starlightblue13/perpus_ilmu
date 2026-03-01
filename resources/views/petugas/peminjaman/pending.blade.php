@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Peminjaman Buku</h1>

@include('petugas.peminjaman.tab')

<h2 class="text-2xl font-bold mb-5">Tab : Pending</h2>

<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Tanggal Ajukan</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $p)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">

                <td class="p-3 border">{{ $p->user->nama }}</td>
                <td class="p-3 border">{{ $p->buku->judul }}</td>
                <td class="p-3 border">{{ $p->tanggal_pinjam }}</td>

                <td class="p-3 border">

                    {{-- SETUJUI --}}
                    <form action="{{ route('petugas.peminjaman.setuju', $p->id) }}"
                          method="POST" class="inline">
                        @csrf
                        <button class="px-3 py-1 bg-green-500 text-white rounded">
                            Setujui
                        </button>
                    </form>

                    {{-- TOLAK --}}
                    <a href="?tolak={{ $p->id }}"
                       class="px-3 py-1 bg-red-500 text-white rounded ml-2">
                       Tolak
                    </a>

                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>



{{-- ======================== POPUP TOLAK ========================== --}}
@if($tolakId)
<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">

    <div class="bg-white w-[420px] p-8 rounded-2xl shadow-2xl">

        <h2 class="text-xl font-bold mb-4">Alasan Penolakan</h2>

        <form action="{{ route('petugas.peminjaman.tolak', $tolakId) }}" method="POST">
            @csrf

            <textarea name="alasan" rows="4" class="w-full border p-3 rounded-lg"
                      placeholder="Tuliskan alasan penolakan..." required></textarea>

            <div class="flex justify-end gap-3 mt-5">

                <a href="{{ route('petugas.peminjaman.pending') }}"
                   class="px-5 py-2 bg-gray-400 rounded text-white">
                   Batal
                </a>

                <button class="px-5 py-2 bg-red-600 rounded text-white">
                    Tolak
                </button>
            </div>
        </form>

    </div>

</div>
@endif

@endsection
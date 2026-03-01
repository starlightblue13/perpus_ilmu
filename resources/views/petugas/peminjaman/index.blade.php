@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Peminjaman Buku</h1>

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
            @foreach($pending as $p)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">
                <td class="p-3 border">{{ $p->user->nama }}</td>
                <td class="p-3 border">{{ $p->buku->judul }}</td>
                <td class="p-3 border">{{ $p->tanggal_pinjam }}</td>

                <td class="p-3 border flex gap-3">

                    <!-- SETUJUI -->
                    <a href="?setuju={{ $p->id }}"
                       class="px-4 py-1 bg-green-600 text-white rounded">
                        Setujui
                    </a>

                    <!-- TOLAK -->
                    <a href="?tolak={{ $p->id }}"
                       class="px-4 py-1 bg-red-600 text-white rounded">
                        Tolak
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



{{-- ======================================================== --}}
{{-- =============== POPUP SETUJUI (NO JS) ================== --}}
{{-- ======================================================== --}}
@if($setujuId)
<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">
    <div class="bg-white w-[420px] p-8 rounded-2xl shadow-2xl text-center">

        <h2 class="text-2xl font-bold mb-3">Setujui Peminjaman?</h2>
        <p class="text-gray-600 mb-6">Anda akan menyetujui permintaan ini.</p>

        <form action="{{ route('petugas.peminjaman.setuju', $setujuId) }}" method="POST">
            @csrf
            <button class="px-6 py-2 bg-green-600 text-white rounded-lg">ya, setujui</button>
        </form>

        <a href="{{ route('petugas.peminjaman') }}"
           class="mt-4 inline-block px-6 py-2 bg-gray-400 text-white rounded-lg">
            batal
        </a>

    </div>
</div>
@endif



{{-- ======================================================== --}}
{{-- =============== POPUP TOLAK (NO JS) ==================== --}}
{{-- ======================================================== --}}
@if($tolakId)
<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">
    <div class="bg-white w-[450px] p-8 rounded-2xl shadow-2xl">

        <h2 class="text-2xl font-bold mb-4 text-center">Tolak Peminjaman?</h2>

        <form action="{{ route('petugas.peminjaman.tolak', $tolakId) }}" method="POST">
            @csrf

            <label class="font-semibold">Alasan Penolakan:</label>
            <input type="text" name="alasan"
                   class="w-full border p-2 rounded mb-5"
                   placeholder="contoh: stok buku habis"
                   required>

            <div class="flex gap-4 justify-center">
                <button class="px-6 py-2 bg-red-600 text-white rounded-lg">
                    ya, tolak
                </button>

                <a href="{{ route('petugas.peminjaman') }}"
                   class="px-6 py-2 bg-gray-400 text-white rounded-lg">
                    batal
                </a>
            </div>

        </form>
    </div>
</div>
@endif

@endsection
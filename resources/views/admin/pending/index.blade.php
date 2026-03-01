@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-extrabold mb-10 text-center">Permintaan Pending</h1>

{{-- ====================== PERMINTAAN PEMINJAMAN ======================== --}}
<h2 class="text-2xl font-bold mb-4">Permintaan Peminjaman Siswa</h2>

<div class="bg-white p-6 rounded-xl shadow-lg mb-12">
    <table class="w-full text-left border border-gray-300">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Tanggal Ajukan</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($peminjaman as $p)
            <tr class="border {{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">
                <td class="p-3 border">{{ $p->user->nama }}</td>
                <td class="p-3 border">{{ $p->buku->judul }}</td>
                <td class="p-3 border">{{ $p->tanggal_pinjam }}</td>
                <td class="p-3 border">{{ $p->status }}</td>
                <td class="p-3 border">
    <form action="{{ route('admin.pending.pinjam.tolak', $p->id) }}" method="POST" class="inline">
        @csrf
        <button class="px-3 py-1 bg-red-400 rounded text-white">Tolak</button>
    </form>

    <form action="{{ route('admin.pending.pinjam.setuju', $p->id) }}" method="POST" class="inline ml-2">
        @csrf
        <button class="px-3 py-1 bg-green-400 rounded text-white">Setujui</button>
    </form>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



{{-- ====================== PERMINTAAN TAMBAH BUKU ======================== --}}
<h2 class="text-2xl font-bold mb-4">Permintaan Tambah Buku Petugas</h2>

<div class="bg-white p-6 rounded-xl shadow-lg">
    <table class="w-full text-left border border-gray-300">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">Petugas</th>
                <th class="p-3 border">Judul Buku</th>
                <th class="p-3 border">Tahun</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($permintaanBuku as $b)
            <tr class="border {{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">
                <td class="p-3 border">{{ $b->petugas->nama }}</td>
                <td class="p-3 border">{{ $b->judul }}</td>
                <td class="p-3 border">{{ $b->tahun }}</td>
                <td class="p-3 border">{{ $b->status }}</td>
                <td class="p-3 border">

                    <form action="{{ route('admin.pending.buku.tolak', $b->id) }}" method="POST" class="inline">
                        @csrf
                        <button class="px-3 py-1 bg-red-400 rounded text-white">Tolak</button>
                    </form>

                    <form action="{{ route('admin.pending.buku.setuju', $b->id) }}" method="POST" class="inline">
                        @csrf
                        <button class="px-3 py-1 bg-green-400 rounded text-white">Setujui</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

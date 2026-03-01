@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">Riwayat Peminjaman</h1>

<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Tanggal Pinjam</th>
                <th class="p-3 border">Tanggal Kembali</th>
                <th class="p-3 border">Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($riwayat as $item)
            <tr class="border {{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">

                <td class="p-3 border">{{ $item->user->nama }}</td>

                <td class="p-3 border">{{ $item->buku->judul }}</td>

                <td class="p-3 border">
                    {{ $item->tanggal_pinjam ? date('d/m/Y', strtotime($item->tanggal_pinjam)) : '-' }}
                </td>

                <td class="p-3 border">
                    {{ $item->tanggal_kembali ? date('d/m/Y', strtotime($item->tanggal_kembali)) : '-' }}
                </td>

                <td class="p-3 border font-semibold text-green-700">
                    {{ $item->status }}
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500">
                    Belum ada riwayat pengembalian buku.
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection

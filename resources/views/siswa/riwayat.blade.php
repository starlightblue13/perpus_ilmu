@extends('layouts.siswa')
@php $hideFooter = true; @endphp

@section('content')

<h1 class="text-3xl font-bold mb-8 text-gray-800">Riwayat Peminjaman</h1>

<div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">

    <table class="w-full border-collapse text-left shadow-sm overflow-hidden rounded-xl">
        <thead>
            <tr class="bg-[#BFD4E6] text-gray-800">
                <th class="p-4 border border-gray-300 font-semibold">No</th>
                <th class="p-4 border border-gray-300 font-semibold">Judul Buku</th>
                <th class="p-4 border border-gray-300 font-semibold">Tanggal Pinjam</th>
                <th class="p-4 border border-gray-300 font-semibold">Tanggal Kembali</th>
                <th class="p-4 border border-gray-300 font-semibold">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $i => $p)
            <tr class="{{ $loop->odd ? 'bg-[#E8F1FA]' : 'bg-[#D4E2F2]' }} hover:bg-blue-100 transition">

                <td class="p-4 border border-gray-300 font-medium">
                    {{ $i+1 }}
                </td>

                <td class="p-4 border border-gray-300 font-medium">
                    {{ $p->buku->judul }}
                </td>

                <td class="p-4 border border-gray-300">
                    {{ $p->tanggal_pinjam }}
                </td>

                <td class="p-4 border border-gray-300">
                    {{ $p->tanggal_kembali }}
                </td>

                <td class="p-4 border border-gray-300">

                    @if($p->status == 'Dikembalikan' && $p->rating == null)
                        <a href="{{ route('siswa.riwayat.rating', $p->id) }}"
                            class="px-4 py-1 bg-blue-400 text-white rounded-lg shadow hover:bg-blue-500 transition">
                            ★ Rating
                        </a>

                    @elseif($p->status == 'Dikembalikan' && $p->rating != null)
                        <a href="{{ route('siswa.riwayat.rating.lihat', $p->id) }}"
                           class="px-4 py-1 bg-gray-400 text-white rounded-lg shadow hover:bg-gray-500 transition">
                           👁 Lihat Rating
                        </a>
                    @endif

                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-4">Buku Ditolak</h1>

<a href="{{ route('petugas.buku.tambah') }}"
   class="inline-block mb-6 px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
    + Tambah Buku
</a>

<!-- TAB MENU (kalau ada) -->
@include('petugas.buku.tab')
<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    @if($buku->isEmpty())
        <p class="text-center text-gray-600 py-6">Belum ada buku yang ditolak.</p>
    @else

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-red-200 text-gray-700">
                <th class="p-3 border">Judul</th>
                <th class="p-3 border">Penulis</th>
                <th class="p-3 border">Penerbit</th>
                <th class="p-3 border">Tahun</th>
                <th class="p-3 border">Alasan Ditolak</th>
            </tr>
        </thead>

        <tbody>
            @foreach($buku as $b)
            <tr class="hover:bg-red-50">
                <td class="p-3 border">{{ $b->judul }}</td>
                <td class="p-3 border">{{ $b->penulis }}</td>
                <td class="p-3 border">{{ $b->penerbit }}</td>
                <td class="p-3 border">{{ $b->tahun }}</td>

                <td class="p-3 border text-red-600 font-semibold">
                    {{ $b->alasan_penolakan ?? 'Tidak ada alasan' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif

</div>

@endsection

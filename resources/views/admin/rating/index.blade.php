@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">Rating Buku (Oleh User)</h1>

<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Jumlah Rating</th>
                <th class="p-3 border">Rata-rata</th>
                <th class="p-3 border">Aksi (Detail)</th>
            </tr>
        </thead>

        <tbody>
            @foreach($buku as $b)
            @php
                $jumlah = $b->peminjaman->whereNotNull('rating')->count();
                $rata = $b->peminjaman->whereNotNull('rating')->avg('rating');
            @endphp

            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">

                <td class="p-3 border">{{ $b->judul }}</td>

                <td class="p-3 border text-center">
                    {{ $jumlah }}
                </td>

                <td class="p-3 border text-center">
                    ⭐ {{ number_format($rata,1) }}
                </td>

                <td class="p-3 border text-center">
                    <a href="{{ route('admin.rating.detail', $b->id) }}"
                       class="px-4 py-1 bg-blue-500 text-white rounded">
                        Lihat Rating
                    </a>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
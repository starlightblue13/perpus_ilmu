@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Rating Buku</h1>

<div class="bg-white rounded-xl shadow p-6 border border-gray-300">

    <table class="w-full text-left border border-gray-300">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Rating</th>
                <th class="p-3 border">Komentar</th>
                <th class="p-3 border">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach($rating as $r)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">

                <td class="p-3 border">{{ $r->user->nama }}</td>
                <td class="p-3 border">{{ $r->buku->judul }}</td>

                {{-- ================= RATING BINTANG ================= --}}
                <td class="p-3 border">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $r->rating)
                            <span class="text-yellow-500 text-xl">★</span>
                        @else
                            <span class="text-gray-400 text-xl">★</span>
                        @endif
                    @endfor
                </td>

                <td class="p-3 border">
                    {{ $r->komentar ?? '-' }}
                </td>

                <td class="p-3 border">
                    {{ $r->updated_at->format('d/m/Y') }}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
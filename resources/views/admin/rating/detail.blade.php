@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Detail Rating Buku : {{ $buku->judul }}
</h1>

<div class="bg-white p-6 rounded-xl shadow mb-8">

    <p class="text-xl">
        <strong>Rata-rata :</strong> ⭐ {{ number_format($rata,1) }}
        <span class="text-gray-600">({{ $rata ? number_format($rata,1) : '-' }})</span>
    </p>

    <p class="text-xl mt-2">
        <strong>Total Rating :</strong> {{ $jumlah }}
    </p>

</div>

<div class="bg-white p-6 rounded-xl shadow">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Rating</th>
                <th class="p-3 border">Komentar</th>
                <th class="p-3 border">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach($rating as $r)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">

                <td class="p-3 border">{{ $r->user->nama }}</td>

                <td class="p-3 border">
                    ⭐ {{ $r->rating }}
                </td>

                <td class="p-3 border">
                    {{ $r->komentar ?? '-' }}
                </td>

                <td class="p-3 border">
                    {{ $r->created_at->format('d/m/Y') }}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<a href="{{ route('admin.rating.index') }}"
   class="mt-6 inline-block px-6 py-2 bg-gray-300 rounded shadow">
    Kembali
</a>

@endsection
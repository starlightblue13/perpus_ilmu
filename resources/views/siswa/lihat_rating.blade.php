@extends('layouts.siswa')

@section('content')

<h1 class="text-3xl font-bold mb-6">Beri Rating Buku</h1>

<div class="bg-[#F3F6F9] p-10 rounded-xl shadow">

    <div class="grid grid-cols-2 gap-10">

        <div>
            <p><b>Judul Buku :</b> {{ $data->buku->judul }}</p>
            <p><b>Tanggal Pinjam :</b> {{ $data->tanggal_pinjam }}</p>
            <p><b>Tanggal Kembali :</b> {{ $data->tanggal_kembali }}</p>
            <p><b>Komentar :</b><br>{{ $data->komentar }}</p>
        </div>

        <div>
            <p class="font-bold mb-3">Rating</p>

            <div class="text-yellow-500 text-2xl">
                {!! str_repeat('★', $data->rating) !!}
                {!! str_repeat('☆', 5 - $data->rating) !!}
            </div>
        </div>

    </div>

    <a href="{{ route('siswa.riwayat') }}" class="mt-6 inline-block px-6 py-2 bg-gray-300 rounded">Kembali</a>

</div>

@endsection
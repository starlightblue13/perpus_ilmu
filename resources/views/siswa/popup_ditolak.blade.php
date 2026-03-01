@extends('layouts.siswa')
@php $hideFooter = true; @endphp
@section('content')

<div class="flex justify-center mt-24">
    <div class="bg-white w-[450px] p-8 text-center rounded-xl shadow-xl border">

        <div class="text-6xl mb-4 text-yellow-500">⚠️</div>

        <h1 class="text-2xl font-bold mb-2">Peminjaman Ditolak</h1>

        <p class="text-gray-600 mb-2">
            Maaf, peminjaman buku Anda ditolak.
        </p>

        <p class="font-semibold mb-6">
            Alasan: {{ $peminjaman->alasan_tolak }}
        </p>

        <a href="{{ route('siswa.peminjaman.saya') }}">
            <button class="px-10 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Kembali
            </button>
        </a>

    </div>
</div>

@endsection
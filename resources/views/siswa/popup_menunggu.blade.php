@extends('layouts.siswa')
@php $hideFooter = true; @endphp
@section('content')

<div class="flex justify-center mt-24">
    <div class="bg-white w-[500px] p-8 text-center rounded-xl shadow-xl border">

        <div class="text-5xl mb-4">🔄</div>

        <h1 class="text-2xl font-bold mb-2">Menunggu persetujuan</h1>

        <p class="text-gray-600 mb-6">
            Terima kasih telah mengajukan peminjaman. Permintaan Anda sedang menunggu persetujuan petugas.
        </p>

        <a href="{{ route('siswa.peminjaman.saya') }}">
            <button class="px-10 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                Lihat
            </button>
        </a>
    </div>
</div>

@endsection
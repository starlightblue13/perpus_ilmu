@extends('layouts.siswa')
@php $hideFooter = true; @endphp

@section('content')
<div class="flex justify-center mt-24">
    <div class="bg-white p-10 rounded-xl shadow-xl w-[500px] text-center">

        <div class="text-6xl mb-4">🔄</div>

        <h1 class="text-2xl font-bold mb-2">Menunggu persetujuan</h1>

        <p class="text-gray-600 mb-6">
            ⏳ Terima kasih telah mengajukan peminjaman. Saat ini permintaan Anda sedang menunggu persetujuan petugas.
        </p>

        <a href="{{ route('siswa.peminjaman.saya') }}">
            <button class="px-12 py-3 bg-blue-600 text-white rounded-lg">
                Lihat
            </button>
        </a>

    </div>
</div>
@endsection
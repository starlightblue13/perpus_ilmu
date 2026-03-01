@extends('layouts.siswa')
@php $hideFooter = true; @endphp

@section('content')

<div class="bg-[#D4E2EB] p-10 rounded-xl shadow border mx-auto max-w-4xl">

    <div class="flex items-center gap-6 mb-6">
        <div class="w-20 h-20 bg-blue-900 text-white flex items-center justify-center text-3xl rounded-full">
            {{ strtoupper(substr($user->nama, 0, 1)) }}
        </div>

        <div>
            <h2 class="text-xl font-bold">{{ $user->nama }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
        </div>
    </div>

    <hr class="border-gray-400 mb-6">

    <div class="grid grid-cols-2 gap-8">

        <div>
            <p class="font-bold flex items-center gap-2">
                <i class="fa-solid fa-lock"></i> Password
            </p>
            <p class="mb-4">************</p>

            <p class="font-bold flex items-center gap-2">
                <i class="fa-solid fa-calendar"></i> Tanggal Daftar
            </p>
            <p class="mb-4">{{ $user->created_at->format('d-m-Y') }}</p>
        </div>

        <div>
            <p class="font-bold flex items-center gap-2">
                <i class="fa-solid fa-phone"></i> No Hp
            </p>
            <p class="mb-4">{{ $user->no_hp ?? '-' }}</p>

            <p class="font-bold flex items-center gap-2">
                <i class="fa-solid fa-id-card"></i> Status
            </p>
            <p class="mb-4">Aktif</p>
        </div>

    </div>

    <div class="flex justify-end gap-3 mt-4">
    <a href="{{ route('siswa.profil.edit') }}"
       class="px-8 py-2 bg-blue-700 text-white rounded-lg shadow">
       Edit
    </a>

    {{-- <a href="{{ route('siswa.password.form') }}"
       class="px-8 py-2 bg-gray-600 text-white rounded-lg shadow">
       Ganti Password
    </a> --}}
    </div>

</div>

@endsection

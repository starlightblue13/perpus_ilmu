@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">Profil Admin</h1>

<div class="bg-white rounded-2xl shadow-lg p-10 max-w-4xl mx-auto">

    <!-- HEADER -->
    <div class="flex items-center gap-6 mb-10">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}&background=0E4C75&color=fff&size=120"
             class="w-28 h-28 rounded-full shadow-md">

        <div>
            <h2 class="text-2xl font-bold">{{ $user->nama }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
            <p class="text-sm text-blue-600 mt-1">Administrator Sistem</p>
        </div>
    </div>

    <!-- DETAIL -->
    <div class="grid grid-cols-2 gap-6">

        <div class="bg-gray-50 p-5 rounded-xl border">
            <h3 class="text-lg font-semibold mb-2">Informasi Dasar</h3>
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>No Handphone:</strong> {{ $user->no_hp ?? '—' }}</p>
            <p><strong>Dibuat Pada:</strong> {{ $user->created_at->format('d M Y') }}</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-xl border">
            <h3 class="text-lg font-semibold mb-2">Statistik Admin</h3>
            <p><strong>Jumlah Buku Dikelola:</strong> {{ \App\Models\Buku::count() }}</p>
            <p><strong>Permintaan Pending:</strong> {{ \App\Models\Peminjaman::where('status','Pending')->count() }}</p>
            <p><strong>Total Pengguna:</strong> {{ \App\Models\User::count() }}</p>
        </div>

    </div>

    <!-- BUTTONS -->
    <div class="mt-10 flex gap-4">
        <a href="{{ route('admin.profil.edit') }}"
           class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Edit Profil
        </a>

        <a href="{{ route('admin.profil.password') }}"
           class="px-6 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 transition">
            Ganti Password
        </a>
    </div>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">Permintaan Penambahan Buku</h1>

<div class="space-y-4">

@foreach($permintaanBuku as $p)
    <div class="bg-white p-5 rounded-xl shadow flex gap-5 items-center border">

        {{-- COVER --}}
        @if($p->cover)
            <img src="{{ asset('cover_pending/' . $p->cover) }}" class="w-20 h-24 object-cover rounded">
        @else
            <div class="w-20 h-24 bg-gray-300 rounded flex items-center justify-center">No Cover</div>
        @endif

        <div class="flex-1">
            <h3 class="text-xl font-bold">{{ $p->judul }}</h3>

            <p class="text-gray-600 text-sm mt-1">
                Diajukan oleh: <strong>{{ $p->petugas->nama }}</strong>
            </p>

            <p class="text-gray-600 text-sm">
                Status:
                <span class="font-bold
                    {{ $p->status=='Pending'?'text-orange-500':($p->status=='Disetujui'?'text-green-600':'text-red-600') }}">
                    {{ $p->status }}
                </span>
            </p>

            <p class="text-xs text-gray-500">
                Alasan: {{ $p->alasan }}
            </p>
        </div>

        {{-- BUTTON --}}
        @if ($p->status == 'Pending')

        {{-- SETUJUI --}}
        <form action="{{ route('admin.pending.buku.setuju', $p->id) }}" method="POST">
            @csrf
            <button class="bg-green-600 text-white px-4 py-2 rounded">Setujui</button>
        </form>

        {{-- TOLAK TANPA JS (BUKA POPUP) --}}
        <a href="{{ route('admin.pending.index', ['tolak' => $p->id]) }}"
           class="bg-red-600 text-white px-4 py-2 rounded">
            Tolak
        </a>

        @endif

    </div>
@endforeach

</div>


{{-- ==================== POPUP TOLAK ==================== --}}
@if ($itemTolak)
<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[9999]">

    <div class="bg-white p-6 rounded-xl w-[420px] shadow-2xl text-center">

        <h2 class="text-2xl font-bold mb-4">Alasan Penolakan</h2>

        <form method="POST" action="{{ route('admin.pending.buku.tolak', $itemTolak->id) }}">
            @csrf

            <textarea name="alasan_penolakan"
                class="w-full p-3 border rounded-lg"
                rows="4"
                required></textarea>

            <div class="flex justify-center gap-4 mt-5">

                <a href="{{ route('admin.pending.index') }}"
                   class="px-5 py-2 bg-gray-400 text-white rounded-lg">
                    Batal
                </a>

                <button type="submit"
                        class="px-5 py-2 bg-red-600 text-white rounded-lg">
                    Kirim
                </button>
            </div>

        </form>

    </div>

</div>
@endif

@endsection

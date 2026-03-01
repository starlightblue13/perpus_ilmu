@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">Buku Dipinjam</h1>

<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">User</th>
                <th class="p-3 border">Buku</th>
                <th class="p-3 border">Tanggal Pinjam</th>
                <th class="p-3 border">Jatuh Tempo</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $p)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">

                <td class="p-3 border">{{ $p->user->nama }}</td>
                <td class="p-3 border">{{ $p->buku->judul }}</td>
                <td class="p-3 border">{{ $p->tanggal_pinjam }}</td>
                <td class="p-3 border">{{ $p->tanggal_kembali }}</td>

                <td class="p-3 border">

                    @if($p->status == "Dipinjam")
                        <form action="{{ route('admin.dipinjam.kembalikan', $p->id) }}" method="POST">
                            @csrf
                            <button class="px-3 py-1 bg-orange-500 text-white rounded">
                                Tandai Dikembalikan
                            </button>
                        </form>
                    @else
                        <span class="text-green-600 font-semibold">Sudah Dikembalikan</span>
                    @endif

                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
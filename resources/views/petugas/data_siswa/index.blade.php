@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Data Siswa</h1>

<div class="bg-white p-6 rounded-xl shadow max-w-4xl">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">No</th>
                <th class="p-3 border">Nama</th>
                <th class="p-3 border">Email</th>
                <th class="p-3 border">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($siswa as $i => $item)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">
                <td class="p-3 border">{{ $i + 1 }}</td>
                <td class="p-3 border">{{ $item->nama }}</td>
                <td class="p-3 border">{{ $item->email }}</td>

                <td class="p-3 border font-semibold">
                    {{ $item->status ?? 'Aktif' }}
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
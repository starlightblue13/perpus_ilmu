@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Data Siswa</h1>

<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-300">

    <table class="w-full border border-gray-300">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border">No</th>
                <th class="p-3 border">Nama</th>
                <th class="p-3 border">Email</th>
                <th class="p-3 border">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($siswa as $index => $u)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">
                <td class="p-3 border">{{ $index + 1 }}</td>
                <td class="p-3 border">{{ $u->nama }}</td>
                <td class="p-3 border">{{ $u->email }}</td>
                <td class="p-3 border text-green-700 font-semibold">Aktif</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">Data Pengguna / Peminjam</h1>

<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-[#C7D8E8] text-gray-800">
                <th class="p-3 border border-gray-300">No</th>
                <th class="p-3 border border-gray-300">Nama</th>
                <th class="p-3 border border-gray-300">Email</th>
                <th class="p-3 border border-gray-300">Status</th>
                <th class="p-3 border border-gray-300 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pengguna as $item)
            <tr class="hover:bg-[#EAF2F8] transition">

                <td class="p-3 border border-gray-300">{{ $loop->iteration }}</td>

                <td class="p-3 border border-gray-300 font-semibold text-gray-700">
                    {{ $item->nama }}
                </td>

                <td class="p-3 border border-gray-300">
                    {{ $item->email }}
                </td>

                <td class="p-3 border border-gray-300">
                    <span class="px-3 py-1 rounded text-sm 
                        {{ $item->status == 'Aktif' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                        {{ $item->status }}
                    </span>
                </td>

                <td class="p-3 border border-gray-300 text-center">

                    <form action="{{ route('admin.pengguna.delete', $item->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')"
                          class="inline-block">
                        @csrf
                        @method('DELETE')

                        <button class="px-3 py-1 bg-red-600 text-white rounded-lg shadow 
                                       hover:bg-red-700 transition">
                            Hapus
                        </button>
                    </form>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
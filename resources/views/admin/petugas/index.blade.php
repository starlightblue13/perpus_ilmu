@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">Kelola Data Petugas</h1>

<a href="{{ route('admin.petugas.create') }}" 
   class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition mb-6 inline-block">
    + Tambah Petugas
</a>

<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-[#C7D8E8] text-gray-800">
                <th class="p-3 border border-gray-300">No</th>
                <th class="p-3 border border-gray-300">Nama</th>
                <th class="p-3 border border-gray-300">Email</th>
                <th class="p-3 border border-gray-300 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($petugas as $item)
            <tr class="hover:bg-[#EAF2F8] transition">

                <td class="p-3 border border-gray-300">{{ $loop->iteration }}</td>

                <td class="p-3 border border-gray-300 font-semibold text-gray-700">
                    {{ $item->nama }}
                </td>

                <td class="p-3 border border-gray-300">
                    {{ $item->email }}
                </td>

                <td class="p-3 border border-gray-300">

                    <div class="flex justify-center gap-3">

                        {{-- EDIT --}}
                        <a href="{{ route('admin.petugas.edit', $item->id) }}"
                           class="px-3 py-1 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                            Edit
                        </a>

                        {{-- HAPUS --}}
                        <form action="{{ route('admin.petugas.destroy', $item->id) }}" 
                              method="POST"
                              onsubmit="return confirm('Hapus petugas ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                                Hapus
                            </button>
                        </form>

                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
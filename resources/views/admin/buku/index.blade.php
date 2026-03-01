@extends('layouts.admin')

@section('content')

<!-- JUDUL + TOMBOL -->
<div class="flex justify-between items-center mb-10">
    <h1 class="text-3xl font-bold text-gray-700">Data Buku</h1>

    <a href="{{ route('admin.buku.create') }}"
       class="px-5 py-2 bg-blue-200 border border-blue-400 rounded-lg font-semibold hover:bg-blue-300 shadow">
        + Tambah Buku
    </a>
</div>

<!-- TABEL -->
<div class="bg-white border border-gray-300 rounded-xl shadow-md p-6 w-full max-w-5xl mx-auto">

    <table class="w-full border-collapse text-left">
        
        <!-- HEADER -->
        <thead>
            <tr class="bg-[#cddce6]">
                <th class="border px-4 py-3 text-center font-semibold">No</th>
                <th class="border px-4 py-3 font-semibold">Gambar</th>
                <th class="border px-4 py-3 font-semibold">Judul</th>
                <th class="border px-4 py-3 font-semibold">Penulis</th>
                <th class="border px-4 py-3 font-semibold">Kategori</th>
                <th class="border px-4 py-3 text-center font-semibold">Stok</th>
                <th class="border px-4 py-3 text-center font-semibold w-24">Aksi</th>
            </tr>
        </thead>

        <!-- BODY -->
        <tbody>

            @forelse($buku as $item)
                <tr class="bg-blue-100 hover:bg-blue-200 transition">

                    <td class="border px-4 py-3 text-center">{{ $loop->iteration }}</td>

                   <td class="border px-4 py-3">
                     @if($item->gambar)
                   <img src="{{ asset('cover_buku/' . $item->gambar) }}"
                   class="w-16 h-24 object-cover rounded shadow"
                   alt="cover">
                      @else
                   <span class="text-gray-400">Tidak ada</span>
                      @endif
                   </td>
                   
                    <td class="border px-4 py-3">{{ $item->judul }}</td>
                    <td class="border px-4 py-3">{{ $item->penulis }}</td>
                   <td class="border px-4 py-3">{{ $item->kategori->nama ?? 'Tidak ada kategori' }}
</td>


                    <td class="border px-4 py-3 text-center">{{ $item->stok }}</td>

                    <!-- AKSI -->
                    <td class="border px-4 py-3">
                        <div class="flex justify-center space-x-3">

                            <!-- EDIT -->
                            <a href="{{ route('admin.buku.edit', $item->id) }}" 
                               class="text-blue-700 hover:text-blue-900">
                                <i class="fa-solid fa-pen-to-square text-lg"></i>
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('admin.buku.delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus buku ini?')"
                                    class="text-red-600 hover:text-red-800">
                                    <i class="fa-solid fa-trash text-lg"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="py-8 text-center text-gray-500">
                        Belum ada data buku.
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection

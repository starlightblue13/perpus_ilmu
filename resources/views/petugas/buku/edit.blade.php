@extends('layouts.no-sidebar')

@section('content')

<h1 class="text-3xl font-bold mb-8">Edit Pengajuan Buku</h1>

<div class="bg-white p-8 rounded-2xl shadow border w-full max-w-4xl">

    <form action="{{ route('petugas.buku.update', $buku->id) }}" 
          method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-8">

            <!-- KIRI -->
            <div class="space-y-5">

                <!-- Cover Lama -->
                @if($buku->cover)
                    <img src="{{ asset('storage/permintaan/'.$buku->cover) }}"
                         class="w-32 h-40 object-cover rounded shadow mb-3">
                @endif

                <div>
                    <label class="font-semibold">Ganti Cover Buku:</label>
                    <input type="file" name="cover"
                           class="w-full p-3 border rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Judul Buku:</label>
                    <input type="text" name="judul" value="{{ $buku->judul }}"
                           class="w-full p-3 border rounded-lg" required>
                </div>

                <div>
                    <label class="font-semibold">Penulis:</label>
                    <input type="text" name="penulis" value="{{ $buku->penulis }}"
                           class="w-full p-3 border rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Penerbit:</label>
                    <input type="text" name="penerbit" value="{{ $buku->penerbit }}"
                           class="w-full p-3 border rounded-lg">
                </div>

            </div>

            <!-- KANAN -->
            <div class="space-y-5">

                <div>
                    <label class="font-semibold">Tahun Terbit:</label>
                    <input type="number" name="tahun" value="{{ $buku->tahun }}"
                           class="w-full p-3 border rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Alasan Pengajuan:</label>
                    <textarea name="alasan" rows="5"
                              class="w-full p-3 border rounded-lg">{{ $buku->alasan }}</textarea>
                </div>

            </div>

        </div>

        <div class="flex justify-center gap-6 mt-10">

            <button type="submit"
                    class="px-8 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                Simpan Perubahan
            </button>

            <a href="{{ route('petugas.buku.index') }}"
               class="px-8 py-3 bg-gray-400 text-white rounded-lg shadow hover:bg-gray-500">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection
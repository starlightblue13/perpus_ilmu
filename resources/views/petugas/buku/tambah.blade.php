@extends('layouts.no-sidebar')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Ajukan Penambahan Buku</h1>

    <div class="bg-white p-8 rounded-xl shadow max-w-4xl mx-auto border">

        <form action="{{ route('petugas.buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold">Judul Buku:</label>
                    <input type="text" name="judul" class="w-full p-3 border rounded-lg" required>

                    <label class="font-semibold mt-3 block">Penulis:</label>
                    <input type="text" name="penulis" class="w-full p-3 border rounded-lg">

                    <label class="font-semibold mt-3 block">Penerbit:</label>
                    <input type="text" name="penerbit" class="w-full p-3 border rounded-lg">

                    <label class="font-semibold mt-3 block">Tahun Terbit:</label>
                    <input type="number" name="tahun" class="w-full p-3 border rounded-lg">

                    <label class="font-semibold mt-3 block">Stok:</label>
                    <input type="number" name="stok" class="w-full p-3 border rounded-lg" required>
                </div>

                <div>

                    <label class="font-semibold">Kategori:</label>
                    <select name="kategori_id" class="w-full p-3 border rounded-lg" required>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>

                    <label class="font-semibold mt-3 block">Jumlah Halaman:</label>
                    <input type="number" name="halaman" class="w-full p-3 border rounded-lg" required>

                    <label class="font-semibold mt-3 block">Upload Cover:</label>
                    <input type="file" name="cover" class="w-full p-3 border rounded-lg">

                    <label class="font-semibold mt-3 block">Alasan Penambahan Buku:</label>
                    <textarea name="alasan" class="w-full p-3 border rounded-lg" rows="4" required></textarea>

                    <label class="font-semibold mt-3 block">Deskripsi Buku:</label>
                    <textarea name="deskripsi" class="w-full p-3 border rounded-lg" rows="5" required></textarea>

                </div>

            </div>

            <div class="flex justify-center mt-10 gap-4">
                <button class="px-6 py-2 bg-blue-600 text-white rounded-lg">Ajukan</button>
                <a href="{{ route('petugas.buku.index') }}" class="px-6 py-2 bg-gray-300 rounded-lg">Batal</a>
            </div>

        </form>

    </div>
@endsection

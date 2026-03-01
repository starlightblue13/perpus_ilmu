@extends('layouts.no-sidebar')

@section('content')

<div class="w-full flex justify-center">
    <div class="w-[90%] bg-blue-100 p-10 rounded-xl shadow-lg">

        <h1 class="text-3xl font-bold text-center text-gray-700 mb-10">
            Tambah Buku
        </h1>

        <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-10">

                <!-- ==================== KOLOM KIRI ==================== -->
                <div class="space-y-5">

                    <!-- Upload Gambar -->
                    <div>
                        <label class="font-semibold">Upload Gambar Buku :</label>
                        <input type="file" name="gambar"
                               class="w-full mt-1 p-3 rounded-lg border border-gray-300">
                    </div>

                    <!-- Judul Buku -->
                    <div>
                        <label class="font-semibold">Judul Buku :</label>
                        <input type="text" name="judul"
                               class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-300"
                               placeholder="Masukkan judul buku" required>
                    </div>

                    <!-- Penulis -->
                    <div>
                        <label class="font-semibold">Penulis :</label>
                        <input type="text" name="penulis"
                               class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-300"
                               placeholder="Nama Penulis" required>
                    </div>

                    <!-- Penerbit -->
                    <div>
                        <label class="font-semibold">Penerbit :</label>
                        <input type="text" name="penerbit"
                               class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-300"
                               placeholder="Nama Penerbit" required>
                    </div>

                    <!-- Tahun Terbit -->
                    <div>
                        <label class="font-semibold">Tahun Terbit :</label>
                        <input type="number" name="tahun_terbit"
                               class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-300"
                               placeholder="Contoh: 2020" required>
                    </div>

                </div>

                <!-- ==================== KOLOM KANAN ==================== -->
                <div class="space-y-5">

                    <!-- Kategori (FINAL FIX) -->
                    <div>
                        <label class="font-semibold">Kategori :</label>
                       <select name="kategori_id"
                         class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-300">
                    @foreach($kategori as $kat)
                       <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
    @endforeach
                       </select>
                    </div>

                    <!-- Stok -->
                    <div>
                        <label class="font-semibold">Stok :</label>
                        <input type="number" name="stok"
                               class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-300"
                               placeholder="Jumlah Stok" required>
                    </div>

                    <!-- Jumlah Halaman -->
                    <div>
                        <label class="font-semibold">Jumlah Halaman :</label>
                        <input type="number" name="halaman"
                               class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-300"
                               placeholder="Contoh: 280 Halaman">
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="font-semibold">Deskripsi :</label>
                        <textarea name="deskripsi" rows="4"
                                  class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-300"
                                  placeholder="Masukkan deskripsi buku"></textarea>
                    </div>

                </div>

            </div>

            <!-- ==================== TOMBOL AKSI ==================== -->
            <div class="flex justify-center gap-6 mt-10">

                <button type="submit"
                        class="px-8 py-3 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600">
                    Simpan
                </button>

                <a href="{{ route('admin.buku.index') }}"
                   class="px-8 py-3 bg-blue-300 text-gray-700 rounded-lg font-semibold hover:bg-blue-400">
                    Batal
                </a>

            </div>

        </form>

    </div>
</div>

@endsection
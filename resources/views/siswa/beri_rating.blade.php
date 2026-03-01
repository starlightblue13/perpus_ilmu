@extends('layouts.siswa')

@section('content')

<h1 class="text-3xl font-bold mb-6">Beri Rating Buku</h1>

<div class="bg-[#F3F6F9] p-10 rounded-xl shadow">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <div>
            <p><b>Judul Buku :</b> {{ $data->buku->judul }}</p>
            <p><b>Tanggal Pinjam :</b> {{ $data->tanggal_pinjam }}</p>
            <p><b>Tanggal Kembali :</b> {{ $data->tanggal_kembali }}</p>

            <form action="{{ route('siswa.riwayat.rating.simpan', $data->id) }}" 
                  method="POST" class="mt-6">
                @csrf

                <label class="font-bold block mb-2">Beri Rating (1–5)</label>

                <!-- ★★★★★ RADIO TANPA CSS -->
                <div class="flex items-center gap-4 text-3xl text-yellow-500">

                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="radio" name="rating" value="1" required>
                        ★
                    </label>

                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="radio" name="rating" value="2" required>
                        ★★
                    </label>

                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="radio" name="rating" value="3" required>
                        ★★★
                    </label>

                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="radio" name="rating" value="4" required>
                        ★★★★
                    </label>

                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="radio" name="rating" value="5" required>
                        ★★★★★
                    </label>

                </div>

                <label class="font-bold block mt-4 mb-1">Komentar (opsional):</label>
                <textarea name="komentar"
                          class="w-full border border-gray-300 rounded-lg p-3 h-28 focus:border-blue-400 focus:ring"
                          placeholder="Tulis komentar..."></textarea>

                <div class="mt-4 flex gap-3">
                    <button class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Kirim Rating
                    </button>
                    <a href="{{ route('siswa.riwayat') }}" 
                       class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>

</div>

@endsection
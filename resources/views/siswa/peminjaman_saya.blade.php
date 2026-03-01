@extends('layouts.siswa')
@php $hideFooter = true; @endphp
@section('content')

<h1 class="text-3xl font-bold mb-8">Peminjaman Saya</h1>

<!-- WRAPPER -->
<div class="bg-white p-6 rounded-xl shadow border border-gray-300">

    <table class="w-full border border-gray-300 text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3 border border-gray-300">No</th>
                <th class="p-3 border border-gray-300">Judul Buku</th>
                <th class="p-3 border border-gray-300">Tanggal Pinjam</th>
                <th class="p-3 border border-gray-300">Batas Kembali</th>
                <th class="p-3 border border-gray-300">Status</th>
                <th class="p-3 border border-gray-300">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $i => $p)
            <tr class="border border-gray-300 {{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">
                
                <td class="p-3 border border-gray-300">{{ $i + 1 }}</td>

                <td class="p-3 border border-gray-300">
                    {{ $p->buku->judul }}
                </td>

                <td class="p-3 border border-gray-300">
                    {{ $p->tanggal_pinjam ?? '–' }}
                </td>

                <td class="p-3 border border-gray-300">
                    {{ $p->tanggal_kembali ?? '–' }}
                </td>

                <td class="p-3 border border-gray-300 font-semibold">
                    {{ $p->status }}
                </td>

                <td class="p-3 border border-gray-300">

                    {{-- ================= NOTIFIKASI ADMIN ================= --}}
                    @if($p->status === 'Harus Dikembalikan')
                        <div class="bg-red-200 border border-red-500 text-red-700 p-2 rounded mb-2 text-sm">
                            ⚠️ Admin mengingatkan bahwa buku harus segera dikembalikan.
                        </div>
                    @endif


                    {{-- ================= STATUS: PENDING ================= --}}
                    @if($p->status == 'Pending')
                        <form action="{{ route('siswa.peminjaman.batalkan',$p->id) }}" method="POST">
                            @csrf
                            <button class="px-4 py-1 bg-red-300 rounded">Batalkan</button>
                        </form>

                    {{-- ================= STATUS: DISETUJUI ================= --}}
                    @elseif($p->status == 'Disetujui')
                        <a href="{{ route('siswa.peminjaman.kartu',$p->id) }}" 
                           class="px-4 py-1 bg-blue-300 rounded">Lihat Kartu</a>

                    {{-- ================= STATUS: DITOLAK ================= --}}
                    @elseif($p->status == 'Ditolak')

                        @if($p->popup_ditolak == true)
                            <a href="{{ route('siswa.peminjaman.ditolak',$p->id) }}" 
                               class="px-4 py-1 bg-gray-300 rounded">Lihat</a>
                        @else
                            <a href="{{ route('siswa.buku.detail',$p->buku_id) }}" 
                               class="px-4 py-1 bg-green-300 rounded">Ajukan Ulang</a>
                        @endif

                    {{-- ================= STATUS: DIPINJAM ================= --}}
                    @elseif($p->status == 'Dipinjam')
                        —

                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
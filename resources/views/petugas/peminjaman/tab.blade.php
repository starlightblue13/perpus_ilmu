{{-- ==================== NAVIGASI TAB ==================== --}}
<div class="flex gap-4 mb-8">

    <a href="{{ route('petugas.peminjaman.pending') }}"
       class="px-6 py-2 border rounded-xl shadow-sm
              {{ request()->routeIs('petugas.peminjaman.pending') ? 'bg-white font-bold' : 'bg-gray-100' }}">
        Pending
    </a>

    <a href="{{ route('petugas.peminjaman.dipinjam') }}"
       class="px-6 py-2 border rounded-xl shadow-sm
              {{ request()->routeIs('petugas.peminjaman.dipinjam') ? 'bg-white font-bold' : 'bg-gray-100' }}">
        Dipinjam
    </a>

    <a href="{{ route('petugas.peminjaman.belum_diambil') }}"
   class="px-4 py-2 border shadow-sm rounded-lg {{ request()->routeIs('petugas.peminjaman.belum_diambil') ? 'bg-white shadow' : '' }}">
   Belum Diambil
</a>

    <a href="{{ route('petugas.peminjaman.dikembalikan') }}"
       class="px-6 py-2 border rounded-xl shadow-sm
              {{ request()->routeIs('petugas.peminjaman.dikembalikan') ? 'bg-white font-bold' : 'bg-gray-100' }}">
        Dikembalikan
    </a>

    <a href="{{ route('petugas.peminjaman.ditolak') }}"
       class="px-6 py-2 border rounded-xl shadow-sm
              {{ request()->routeIs('petugas.peminjaman.ditolak') ? 'bg-white font-bold' : 'bg-gray-100' }}">
        Ditolak
    </a>

</div>
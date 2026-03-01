<div class="flex gap-3 mb-6">

    <a href="{{ route('petugas.buku.index') }}"
        class="px-4 py-2 rounded-lg font-semibold
        {{ request()->routeIs('petugas.buku.index') ? 'bg-blue-600 text-white' : 'bg-gray-300' }}">
        Data Buku
    </a>

    <a href="{{ route('petugas.buku.pending') }}"
        class="px-4 py-2 rounded-lg font-semibold
        {{ request()->routeIs('petugas.buku.pending') ? 'bg-blue-600 text-white' : 'bg-gray-300' }}">
        Pending
    </a>

    <a href="{{ route('petugas.buku.disetujui') }}"
        class="px-4 py-2 rounded-lg font-semibold
        {{ request()->routeIs('petugas.buku.disetujui') ? 'bg-blue-600 text-white' : 'bg-gray-300' }}">
        Buku Disetujui
    </a>

    <a href="{{ route('petugas.buku.ditolak') }}"
        class="px-4 py-2 rounded-lg font-semibold
        {{ request()->routeIs('petugas.buku.ditolak') ? 'bg-blue-600 text-white' : 'bg-gray-300' }}">
        Buku Ditolak
    </a>

</div>

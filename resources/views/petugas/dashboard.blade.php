@extends('layouts.petugas')

@section('content')

<h1 class="text-3xl font-bold mb-8">Dashboard</h1>

<!-- ===== Statistik ===== -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

    <div class="bg-white p-5 rounded-xl shadow-md border">
        <h2 class="text-sm text-gray-500 font-medium">Permintaan Pending</h2>
        <p class="text-4xl font-bold mt-2">{{ $pending }}</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow-md border">
        <h2 class="text-sm text-gray-500 font-medium">Disetujui</h2>
        <p class="text-4xl font-bold mt-2">{{ $disetujui }}</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow-md border">
        <h2 class="text-sm text-gray-500 font-medium">Sedang Dipinjam</h2>
        <p class="text-4xl font-bold mt-2">{{ $dipinjam }}</p>
    </div>

</div>

<!-- ===== Aktivitas Terbaru ===== -->
<h2 class="text-2xl font-bold mb-4">Aktivitas Terbaru</h2>

<div class="bg-white p-6 rounded-xl shadow-lg border">

    <table class="w-full text-left">
        <thead>
            <tr class="bg-[#C7D8E8]">
                <th class="p-3">User</th>
                <th class="p-3">Buku</th>
                <th class="p-3">Tanggal Ajukan</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($aktivitas as $p)
            <tr class="{{ $loop->odd ? 'bg-[#E2EDF9]' : 'bg-[#C7D8E8]' }}">
                <td class="p-3">{{ $p->user->nama }}</td>
                <td class="p-3">{{ $p->buku->judul }}</td>
                <td class="p-3">{{ $p->tanggal_pinjam }}</td>
                <td class="p-3">

                    <button onclick="openSetuju({{ $p->id }})"
                        class="px-3 py-1 bg-green-500 rounded text-white">Setujui</button>

                    <button onclick="openTolak({{ $p->id }})"
                        class="px-3 py-1 bg-red-500 rounded text-white ml-2">Tolak</button>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

<!-- ===== POPUP SETUJU ===== -->
<div id="popupSetuju" 
     class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-[420px] text-center">
        <h2 class="text-2xl font-bold mb-2">Setujui Permintaan?</h2>

        <form id="formSetuju" method="POST">
            @csrf
            <button class="px-5 py-2 bg-green-500 text-white rounded-lg">ya, setujui</button>
        </form>

        <button onclick="closeSetuju()" 
                class="px-5 py-2 bg-gray-400 rounded-lg mt-3">batal</button>
    </div>
</div>

<!-- ===== POPUP TOLAK ===== -->
<div id="popupTolak" 
     class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-[420px]">

        <h2 class="text-2xl font-bold mb-3">Tolak Permintaan?</h2>

        <form id="formTolak" method="POST">
            @csrf
            <label class="font-semibold">Alasan:</label>
            <input type="text" name="alasan" required
                   class="w-full border px-3 py-2 rounded mb-3">

            <button class="px-5 py-2 bg-red-500 text-white rounded-lg">ya, tolak</button>
        </form>

        <button onclick="closeTolak()" 
                class="px-5 py-2 bg-gray-400 rounded-lg mt-3">batal</button>

    </div>
</div>

<script>
function openSetuju(id){
    document.getElementById('formSetuju').action = "/petugas/peminjaman/" + id + "/setuju";
    document.getElementById('popupSetuju').classList.remove('hidden');
    document.getElementById('popupSetuju').classList.add('flex');
}
function closeSetuju(){
    document.getElementById('popupSetuju').classList.add('hidden');
    document.getElementById('popupSetuju').classList.remove('flex');
}

function openTolak(id){
    document.getElementById('formTolak').action = "/petugas/peminjaman/" + id + "/tolak";
    document.getElementById('popupTolak').classList.remove('hidden');
    document.getElementById('popupTolak').classList.add('flex');
}
function closeTolak(){
    document.getElementById('popupTolak').classList.add('hidden');
    document.getElementById('popupTolak').classList.remove('flex');
}
</script>

@endsection
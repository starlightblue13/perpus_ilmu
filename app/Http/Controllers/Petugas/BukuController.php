<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\PermintaanBuku;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->orderBy('created_at', 'desc')->get();
        return view('petugas.buku.index', compact('buku'));
    }

    public function tambah()
    {
        $kategori = Kategori::all();
        return view('petugas.buku.tambah', compact('kategori'));
    }

    public function store(Request $request)
{
    $fileName = null;

    if ($request->hasFile('cover')) {
        $file = $request->file('cover');

        // Nama file unik
        $fileName = time() . '_' . $file->getClientOriginalName();

        // SIMPAN DI public/cover_buku → AGAR MUNCUL DI KATALOG SISWA
        $file->move(public_path('cover_buku'), $fileName);
    }

    // Simpan permintaan buku
    PermintaanBuku::create([
        'petugas_id' => Auth::id(),
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'tahun' => $request->tahun,
        'stok' => $request->stok,
        'kategori_id' => $request->kategori_id,
        'halaman' => $request->halaman,
        'deskripsi' => $request->deskripsi,
        'cover' => $fileName,
        'alasan' => $request->alasan,
        'status' => 'Pending',
    ]);

    return redirect()->route('petugas.buku.pending')
        ->with('success', 'Pengajuan buku dikirim.');
}

    public function pending()
    {
        $buku = PermintaanBuku::with('kategori')
            ->where('petugas_id', Auth::id())
            ->where('status', 'Pending')
            ->get();

        return view('petugas.buku.pending', compact('buku'));
    }

    public function disetujui()
    {
        $buku = PermintaanBuku::with('kategori')
            ->where('petugas_id', Auth::id())
            ->where('status', 'Disetujui')
            ->get();

        return view('petugas.buku.disetujui', compact('buku'));
    }

    public function ditolak()
    {
        $buku = PermintaanBuku::with('kategori')
            ->where('petugas_id', Auth::id())
            ->where('status', 'Ditolak')
            ->get();

        return view('petugas.buku.ditolak', compact('buku'));
    }
}

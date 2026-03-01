<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermintaanBuku;
use App\Models\Buku;

class PermintaanBukuController extends Controller
{
    public function index()
{
    $permintaan = PermintaanBuku::orderBy('created_at', 'desc')->get();
    return view('admin.permintaan_buku.index', compact('permintaan'));
}

    public function setuju($id)
{
    $p = PermintaanBuku::findOrFail($id);

    // Masukkan ke tabel buku
    Buku::create([
        'judul' => $p->judul,
        'penulis' => $p->penulis,
        'penerbit' => $p->penerbit,
        'kategori_id' => $p->kategori_id,
        'tahun_terbit' => $p->tahun,
        'stok' => $p->stok,
        'halaman' => $p->halaman,
        'deskripsi' => $p->deskripsi,
        'gambar' => $p->cover, // cover tetap dipakai
    ]);

    // Update status permintaan
    $p->update([
        'status' => 'Disetujui',
        'alasan_penolakan' => null
    ]);

    return back()->with('success', 'Buku telah disetujui & masuk ke Data Buku Admin.');
}

public function tolak(Request $request, $id)
{
    $request->validate([
        'alasan_penolakan' => 'required'
    ]);

    $p = PermintaanBuku::findOrFail($id);

    // Masukkan ke tabel buku ditolak
    BukuDitolak::create([
        'judul' => $p->judul,
        'penulis' => $p->penulis,
        'penerbit' => $p->penerbit,
        'cover' => $p->cover,
        'alasan_penolakan' => $request->alasan_penolakan,
    ]);

    $p->update([
        'status' => 'Ditolak',
        'alasan_penolakan' => $request->alasan_penolakan
    ]);

    return back()->with('success', 'Permintaan buku ditolak.');
}

public function tolakForm($id)
{
    $data = PermintaanBuku::with('petugas')->get();
    $itemTolak = PermintaanBuku::findOrFail($id);

    return view('admin.permintaan_buku.index', compact('data', 'itemTolak'));
}

}

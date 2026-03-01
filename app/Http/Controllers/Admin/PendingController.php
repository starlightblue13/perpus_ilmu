<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\PermintaanBuku;
use App\Models\Buku;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function index()
    {
        // Pending Peminjaman
        $peminjaman = Peminjaman::with('user', 'buku')
            ->where('status', 'Pending')
            ->orderBy('id', 'desc')
            ->get();

        // Pending Permintaan Buku (Petugas)
        $permintaanBuku = PermintaanBuku::with('petugas', 'kategori')
            ->where('status', 'Pending')
            ->orderBy('id', 'desc')
            ->get();

// PERBAIKI DATA LAMA SECARA OTOMATIS
foreach ($permintaanBuku as $req) {
    if ($req->petugas_id == 1 && $req->role !== 'petugas') {
        // Jika ternyata bukan admin yang mengajukan,
        // kita perbaiki menjadi petugas pertama (ID 2)
        $req->petugas_id = 2;
        $req->save();
    }
}

        return view('admin.pending.index', compact('peminjaman', 'permintaanBuku'));
    }

    // ======================
    // SETUJU PEMINJAMAN
    // ======================
    public function setujuPinjam($id)
    {
        $p = Peminjaman::findOrFail($id);
        $p->status = "Disetujui";
        $p->save();

        return back()->with('success', 'Peminjaman disetujui.');
    }

    public function tolakPinjam($id)
    {
        $p = Peminjaman::findOrFail($id);
        $p->status = "Ditolak";
        $p->popup_ditolak = true;
        $p->save();

        return back()->with('success', 'Peminjaman ditolak.');
    }

    // ======================
    // SETUJU PERMINTAAN BUKU (PETUGAS)
    // ======================
   public function setujuBuku($id)
{
    $permintaan = PermintaanBuku::findOrFail($id);

    // Pindah data permintaan → tabel buku
    Buku::create([
        'petugas_id' => $permintaan->petugas_id,   // ← kuncinya di sini!
        'judul'      => $permintaan->judul,
        'penulis'    => $permintaan->penulis,
        'penerbit'   => $permintaan->penerbit,
        'tahun_terbit' => $permintaan->tahun,
        'kategori_id' => $permintaan->kategori_id,
        'stok'        => $permintaan->stok,
        'gambar'      => $permintaan->cover,
        'halaman'     => $permintaan->halaman,
        'deskripsi'   => $permintaan->deskripsi,
    ]);

    // Update status permintaan
    $permintaan->status = "Disetujui";
    $permintaan->save();

    return redirect()->back()->with('success', 'Buku berhasil disetujui & ditambahkan');
}

    // ======================
    // TOLAK PERMINTAAN BUKU
    // ======================
    public function tolakBuku($id)
    {
        $req = PermintaanBuku::findOrFail($id);

        $req->update([
            'status' => 'Ditolak'
        ]);

        return back()->with('success', 'Permintaan buku ditolak.');
    }
}

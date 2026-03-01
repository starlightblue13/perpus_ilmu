<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    // ==========================
    // TAB RIWAYAT (khusus admin)
    // ==========================
    public function riwayat()
    {
        $data = Peminjaman::with(['user','buku'])
            ->orderBy('id','desc')
            ->get();

        return view('petugas.peminjaman.riwayat', compact('data'));
    }

    // ==========================
    // TAB DIPINJAM
    // ==========================
    public function dipinjam(Request $request)
    {
        $dipinjam = Peminjaman::where('status', 'Dipinjam')
            ->with(['user', 'buku'])
            ->orderBy('id', 'desc')
            ->get();

        $ingatkanId = $request->ingatkan;

        return view('petugas.peminjaman.dipinjam', compact('dipinjam', 'ingatkanId'));
    }

    public function ingatkan($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        // ubah status → masuk ke halaman pengembalian admin
        $pinjam->status = "Belum Diterima";
        $pinjam->save();

        return redirect()->route('petugas.peminjaman.dipinjam', ['ingatkan' => $id])
            ->with('success', 'Peminjam telah diberi peringatan.');
    }

    // ==========================
    // TAB BELUM DIAMBIL (setelah disetujui)
    // ==========================
    public function belumDiambil()
    {
        $data = Peminjaman::with(['user','buku'])
            ->where('status', 'Menunggu Diambil')
            ->get();

        return view('petugas.peminjaman.belum_diambil', compact('data'));
    }

    public function sudahDiambil($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->status = "Dipinjam";
        $pinjam->save();

        return redirect()->route('petugas.peminjaman.belum_diambil')
            ->with('success', 'Buku sudah diambil dan status berubah menjadi Dipinjam.');
    }

    // ==========================
    // TAB PENDING
    // ==========================
    public function pending(Request $request)
    {
        $data = Peminjaman::where('status', 'Pending')
            ->with(['user','buku'])
            ->orderBy('id','desc')
            ->get();

        $tolakId = $request->tolak;

        return view('petugas.peminjaman.pending', compact('data', 'tolakId'));
    }

    public function setuju($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        // sama dengan petugas
        $pinjam->status = "Menunggu Diambil";
        $pinjam->save();

        return back()->with('success', 'Peminjaman disetujui. Menunggu siswa mengambil buku.');
    }

    public function tolak(Request $request, $id)
{
    $request->validate(['alasan' => 'required']);

    $pinjam = Peminjaman::findOrFail($id);

    $pinjam->status = "Ditolak";
    $pinjam->alasan_tolak = $request->alasan;
    $pinjam->popup_ditolak = true;
    $pinjam->save();

    return redirect()->route('petugas.peminjaman.pending')
        ->with('success', 'Peminjaman ditolak.');
}

    // ==========================
    // TAB DIKEMBALIKAN
    // ==========================
    public function dikembalikan(Request $request)
    {
        $data = Peminjaman::whereIn('status', ['Belum Diterima', 'Dikembalikan'])
            ->with(['user','buku'])
            ->orderBy('id','desc')
            ->get();

        $terimaId = $request->terima;

        return view('petugas.peminjaman.dikembalikan', compact('data', 'terimaId'));
    }

    public function terimaBuku($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->status = "Dikembalikan";
        $pinjam->save();

        return redirect()->route('petugas.peminjaman.dikembalikan')
            ->with('success', 'Buku berhasil diterima.');
    }

    // ==========================
    // TAB DITOLAK
    // ==========================
    public function ditolak(Request $request)
    {
        $data = Peminjaman::where('status', 'Ditolak')
            ->with(['user','buku'])
            ->orderBy('id','desc')
            ->get();

        $lihatId = $request->lihat;

        return view('petugas.peminjaman.ditolak', compact('data', 'lihatId'));
    }

    public function hapus($id)
{
    $pinjam = Peminjaman::findOrFail($id);
    $pinjam->delete();

    return back()->with('success', 'Riwayat peminjaman berhasil dihapus.');
}
}

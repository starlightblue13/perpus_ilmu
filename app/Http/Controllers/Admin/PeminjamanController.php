<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function riwayat()
{
    // Ambil semua peminjaman yang statusnya Dikembalikan
    $riwayat = \App\Models\Peminjaman::where('status', 'Dikembalikan')
                ->with(['user', 'buku'])
                ->orderBy('tanggal_kembali', 'desc')
                ->get();

    return view('admin.riwayat.index', compact('riwayat'));
}

public function dipinjam()
{
    $data = \App\Models\Peminjaman::where('status', 'Dipinjam')->get();

    return view('admin.dipinjam.index', compact('data'));
}

public function ingatkan($id)
{
    $pinjam = Peminjaman::findOrFail($id);

    // update status → siswa akan melihat notif
    $pinjam->status = "Harus Dikembalikan";
    $pinjam->save();

    return redirect()->back()->with('success', 'Notifikasi berhasil dikirim ke siswa.');
}

public function kembalikan($id)
{
    $p = Peminjaman::findOrFail($id);
    $p->status = "Dikembalikan";
    $p->save();

    return back()->with('success', 'Buku telah ditandai sebagai dikembalikan.');
}

}

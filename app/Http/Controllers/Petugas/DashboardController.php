<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $pending = Peminjaman::where('status', 'Pending')->count();
        $disetujui = Peminjaman::where('status', 'Disetujui Petugas')->count();
        $dipinjam = Peminjaman::where('status', 'Dipinjam')->count();

        // Ambil peminjaman pending untuk ditampilkan di aktivitas terbaru
        $aktivitas = Peminjaman::with(['buku', 'user'])
                        ->where('status', 'Pending')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('petugas.dashboard', compact('pending', 'disetujui', 'dipinjam', 'aktivitas'));
    }

    public function setuju($id)
    {
        $p = Peminjaman::findOrFail($id);
        $p->status = "Disetujui Petugas";
        $p->save();

        return back()->with('success', 'Permintaan disetujui.');
    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required'
        ]);

        $p = Peminjaman::findOrFail($id);
        $p->status = "Ditolak Petugas";
        $p->alasan_tolak = $request->alasan;
        $p->popup_ditolak = true;
        $p->save();

        return back()->with('success', 'Permintaan ditolak.');
    }
}
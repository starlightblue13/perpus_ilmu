<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;

class RatingController extends Controller
{
    // Halaman daftar rating per buku
    public function index()
    {
        // Ambil semua buku yang punya rating (minimal 1)
        $buku = Buku::with('peminjaman')
            ->whereHas('peminjaman', function($q){
                $q->whereNotNull('rating'); // hanya buku yg punya rating
            })
            ->get();

        return view('admin.rating.index', compact('buku'));
    }

    // Halaman detail rating berdasarkan buku
    public function detail($id)
    {
        $buku = Buku::findOrFail($id);

        $rating = Peminjaman::where('buku_id', $id)
            ->whereNotNull('rating')
            ->with('user')
            ->orderBy('id', 'desc')
            ->get();

        $rata = $rating->avg('rating');
        $jumlah = $rating->count();

        return view('admin.rating.detail', compact('buku', 'rating', 'rata', 'jumlah'));
    }
}
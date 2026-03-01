<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;

class RatingController extends Controller
{
    public function index()
    {
        // Ambil hanya peminjaman yang punya rating
        $rating = Peminjaman::whereNotNull('rating')
            ->with(['user', 'buku'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('petugas.rating.index', compact('rating'));
    }
}
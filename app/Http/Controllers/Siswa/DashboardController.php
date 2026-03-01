<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Buku;

class DashboardController extends Controller
{
    public function index()
    {
        $buku = Buku::latest()->take(5)->get();
        return view('siswa.dashboard', compact('buku'));
    }
}
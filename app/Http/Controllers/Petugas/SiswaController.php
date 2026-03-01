<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\User;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'siswa')->get();

        return view('petugas.siswa.index', compact('siswa'));
    }
}
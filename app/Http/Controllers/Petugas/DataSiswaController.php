<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\User;

class DataSiswaController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'siswa')
                    ->orderBy('nama', 'asc')
                    ->get();

        return view('petugas.data_siswa.index', compact('siswa'));
    }
}
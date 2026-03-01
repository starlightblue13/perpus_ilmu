<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Peminjam::all();
        return view('admin.pengguna.index', compact('pengguna'));
    }

    public function destroy($id)
    {
        Peminjam::destroy($id);

        return redirect()->route('admin.pengguna.index')
            ->with('success', 'Data pengguna berhasil dihapus');
    }
}

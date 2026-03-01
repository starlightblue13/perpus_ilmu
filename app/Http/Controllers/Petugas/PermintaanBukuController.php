<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermintaanBuku;

class PermintaanBukuController extends Controller
{
    public function create()
    {
        return view('petugas.permintaan_buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $filename = null;
        if ($request->hasFile('cover')) {
            $filename = time() . '_' . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('cover_pending'), $filename);
        }

        PermintaanBuku::create([
    'petugas_id' => auth()->id(),
    'judul' => $request->judul,
    'penulis' => $request->penulis,
    'penerbit' => $request->penerbit,
    'tahun' => $request->tahun,
    'stok' => $request->stok,
    'kategori' => $request->kategori,
    'halaman' => $request->halaman,
    'deskripsi' => $request->deskripsi,
    'cover' => $filename,
    'alasan' => $request->alasan,
]);

        return redirect()->back()->with('success', 'Permintaan buku berhasil diajukan.');
    }
}

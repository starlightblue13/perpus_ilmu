<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return view('admin.buku.index', compact('buku'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.buku.tambah', compact('kategori'));
    }

  public function store(Request $request)
{
    $fileName = null;

    if ($request->hasFile('cover')) {
        $file = $request->file('cover');

        // Nama file unik
        $fileName = time() . '_' . $file->getClientOriginalName();

        // SIMPAN DI public/cover_buku → AGAR MUNCUL DI KATALOG SISWA
        $file->move(public_path('cover_buku'), $fileName);
    }

    // Simpan permintaan buku
    PermintaanBuku::create([
        'petugas_id' => Auth::id(),
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'tahun' => $request->tahun,
        'stok' => $request->stok,
        'kategori_id' => $request->kategori_id,
        'halaman' => $request->halaman,
        'deskripsi' => $request->deskripsi,
        'cover' => $fileName,
        'alasan' => $request->alasan,
        'status' => 'Pending',
    ]);

    return redirect()->route('petugas.buku.pending')
        ->with('success', 'Pengajuan buku dikirim.');
}

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.buku.edit', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if (file_exists(public_path('cover_buku/' . $buku->gambar))) {
                unlink(public_path('cover_buku/' . $buku->gambar));
            }

            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('cover_buku'), $filename);

            $data['gambar'] = $filename;
        }

        $buku->update($data);

        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if (file_exists(public_path('cover_buku/' . $buku->gambar))) {
            unlink(public_path('cover_buku/' . $buku->gambar));
        }

        $buku->delete();

        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}

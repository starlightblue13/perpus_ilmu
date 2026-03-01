<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;

class KatalogController extends Controller
{
   public function index()
{
    $kategori = request()->kategori; 
    $search = request()->search;

    $buku = Buku::query();

    // FILTER KATEGORI
    if ($kategori) {
        $buku->whereHas('kategori', function ($q) use ($kategori) {
            $q->where('nama', $kategori);
        });
    }

    // FITUR PENCARIAN (judul / penulis)
    if ($search) {
        $buku->where(function ($q) use ($search) {
            $q->where('judul', 'LIKE', '%' . $search . '%')
              ->orWhere('penulis', 'LIKE', '%' . $search . '%');
        });
    }

    // Ambil hasil akhir
    $buku = $buku->get();

    return view('siswa.katalog', compact('buku', 'kategori', 'search'));
}

    public function detail($id)
    {
        $buku = Buku::findOrFail($id);
        return view('siswa.detail', compact('buku'));
    }

    public function pinjam($id)
    {
        $buku = Buku::findOrFail($id);

        $user = auth()->user();

        $tanggal_pinjam = date('Y-m-d');
        $tanggal_kembali = date('Y-m-d', strtotime('+7 days'));

        return view('siswa.pinjam', compact('buku', 'user', 'tanggal_pinjam', 'tanggal_kembali'));
    }

    public function ajukan($id)
{
    $buku = Buku::findOrFail($id);
    $user = auth()->user();

    $pinjam = Peminjaman::create([
        'user_id' => $user->id,
        'buku_id' => $buku->id,
        'tanggal_pinjam' => now(),
        'tanggal_kembali' => now()->addDays(7),
        'status' => 'Pending',
    ]);

    return redirect()->route('siswa.peminjaman.popup');
}

     public function peminjamanSaya()
{
    $data = Peminjaman::where('user_id', auth()->id())->get();

    return view('siswa.peminjaman_saya', compact('data'));
}

public function popupMenunggu()
{
    return view('siswa.popup_menunggu');
}

public function kartu($id)
{
    $data = Peminjaman::with(['user', 'buku.kategori'])->findOrFail($id);

    return view('siswa.kartu_peminjaman', compact('data'));
}

public function batalkan($id)
{
    $pinjam = Peminjaman::findOrFail($id);

    // status jadi dibatalkan dan masuk admin/petugas
    $pinjam->status = "Dibatalkan";
    $pinjam->save();

    return redirect()->back()->with('success','Peminjaman berhasil dibatalkan.');
}

public function popupDitolak($id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    // jika popup pernah muncul → jangan tampilkan lagi
    if ($peminjaman->popup_ditolak == false) {
        return redirect()->route('siswa.peminjaman.saya');
    }

    // Setelah tampil → matikan popup
    $peminjaman->popup_ditolak = false;
    $peminjaman->save();

    return view('siswa.popup_ditolak', compact('peminjaman'));
}

public function riwayat()
{
    $data = Peminjaman::where('user_id', auth()->id())
        ->where('status', 'Dikembalikan')   // hanya buku yang sudah kembali
        ->orderBy('id', 'desc')
        ->get();

    return view('siswa.riwayat', compact('data'));
}

public function beriRating($id)
{
    $data = Peminjaman::with('buku')->findOrFail($id);
    return view('siswa.beri_rating', compact('data'));
}

public function simpanRating(Request $request, $id)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'komentar' => 'nullable|string'
    ]);

    $data = Peminjaman::findOrFail($id);
    $data->rating = $request->rating;
    $data->komentar = $request->komentar;
    $data->save();

    return redirect()->route('siswa.riwayat')
                     ->with('success', 'Rating berhasil dikirim');
}

public function lihatRating($id)
{
    $data = Peminjaman::with('buku')->findOrFail($id);
    return view('siswa.lihat_rating', compact('data'));
}

public function profil()
{
    $user = auth()->user(); // data siswa yang login
    return view('siswa.profil', compact('user'));
}

public function profilEdit()
{
    $user = auth()->user();
    return view('siswa.profil_edit', compact('user'));
}

public function profilUpdate(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'nullable|min:6',
        'no_hp' => 'nullable|string'
    ]);

    // Simpan nama ke kolom 'nama'
    $user->nama = $request->nama;

    $user->email = $request->email;

    // Simpan no_hp jika ada
    $user->no_hp = $request->no_hp;

    if ($request->password) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('siswa.profile')
                     ->with('success', 'Profil berhasil diperbarui.');
}

public function passwordForm()
{
    return view('siswa.password_edit');
}

public function passwordUpdate(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    ]);

    $user = auth()->user();

    // cek password lama
    if (!\Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah.']);
    }

    // update password baru
    $user->password = bcrypt($request->new_password);
    $user->save();

    return redirect()->route('siswa.profile')->with('success', 'Password berhasil diganti.');
}


}
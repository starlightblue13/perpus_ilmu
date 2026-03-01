<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;

class DashboardController extends Controller   // ← BENAR
{
    public function index()
    {
        $bukuDipinjam = Peminjaman::where('status', 'Dipinjam')->count();
        $pending = Peminjaman::where('status', 'Pending')->count();
        $totalPengguna = User::where('role', 'siswa')->count();
        $totalPetugas = User::where('role', 'petugas')->count();
        $totalBuku = Buku::count();

        $aktivitas = Peminjaman::with(['buku', 'user'])
                        ->latest()
                        ->take(6)
                        ->get();

        return view('admin.dashboard', compact(
    'bukuDipinjam',
    'pending',
    'totalPengguna',
    'totalPetugas',
    'totalBuku',
    'aktivitas'
        ));
    }

    public function profil()
{
    $user = auth()->user();
    return view('admin.profil.index', compact('user'));
}

public function profilEdit()
{
    $user = auth()->user();
    return view('admin.profil.edit', compact('user'));
}

public function profilUpdate(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'nama' => 'required|string',
        'email' => 'required|email',
        'no_hp' => 'nullable|string'
    ]);

    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->no_hp = $request->no_hp;  // ← WAJIB ADA

    $user->save();

    return redirect()->route('admin.profil')
        ->with('success', 'Profil berhasil diperbarui.');
}

public function passwordForm()
{
    return view('admin.profil.password');
}

public function passwordUpdate(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'password_lama' => 'required',
        'password_baru' => 'required|min:6',
        'konfirmasi_password' => 'required|same:password_baru'
    ]);

    if (!\Hash::check($request->password_lama, $user->password)) {
        return back()->withErrors(['password_lama' => 'Password lama salah']);
    }

    $user->password = bcrypt($request->password_baru);
    $user->save();

    return redirect()->route('admin.profil')
        ->with('success', 'Password berhasil diganti.');
}
}
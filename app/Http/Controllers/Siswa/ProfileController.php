<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // =========================
    // HALAMAN PROFIL SISWA
    // =========================
    public function index()
    {
        $user = auth()->user();

        return view('siswa.profil', compact('user'));
    }

    // =========================
    // HALAMAN EDIT PROFIL
    // =========================
    public function edit()
    {
        $user = auth()->user();

        return view('siswa.profil_edit', compact('user'));
    }

    // =========================
    // UPDATE PROFIL SISWA
    // =========================
    public function update(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'required|email',
            'no_hp'  => 'nullable|string|max:20',
        ]);

        $user = auth()->user();

        $user->nama  = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;

        $user->save();

        return redirect()
            ->route('siswa.profil.index')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}

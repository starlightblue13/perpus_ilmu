<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('petugas.profil.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('petugas.profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'nullable'
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->save();

        return redirect()->route('petugas.profil')->with('success', 'Profil berhasil diperbarui.');
    }

    public function passwordForm()
    {
        return view('petugas.profil.password');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors(['password_lama' => 'Password lama salah']);
        }

        $user->password = Hash::make($request->password_baru);
        $user->save();

        return redirect()->route('petugas.profil')->with('success', 'Password berhasil diperbarui.');
    }
}
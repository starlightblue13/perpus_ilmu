<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = User::where('role', 'petugas')->get();
        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas'
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $petugas->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $petugas->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('admin.petugas.index')->with('success', 'Data petugas berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}

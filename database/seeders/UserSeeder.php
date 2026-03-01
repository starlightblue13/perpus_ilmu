<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ================= ADMIN =================
        User::create([
            'nama' => 'Admin',
            'email' => 'dinara@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // ================= PETUGAS =================
        User::create([
            'nama' => 'Petugas Satu',
            'email' => 'petugas1@gmail.com',
            'password' => Hash::make('password1'),
            'role' => 'petugas'
        ]);

        User::create([
            'nama' => 'Petugas Dua',
            'email' => 'petugas2@gmail.com',
            'password' => Hash::make('password2'),
            'role' => 'petugas'
        ]);

        // ================= SISWA =================
        User::create([
            'nama' => 'Siswa Satu',
            'email' => 'siswa1@gmail.com',
            'password' => Hash::make('password1'),
            'role' => 'siswa'
        ]);

        User::create([
            'nama' => 'Siswa Dua',
            'email' => 'siswa2@gmail.com',
            'password' => Hash::make('password2'),
            'role' => 'siswa'
        ]);

        User::create([
            'nama' => 'Siswa Tiga',
            'email' => 'siswa3@gmail.com',
            'password' => Hash::make('password3'),
            'role' => 'siswa'
        ]);
    }
}

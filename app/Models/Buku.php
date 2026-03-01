<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
    'petugas_id',
    'gambar',
    'judul',
    'penulis',
    'penerbit',
    'tahun_terbit',
    'kategori_id',
    'stok',
    'halaman',
    'deskripsi',
];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function peminjaman()
{
    return $this->hasMany(\App\Models\Peminjaman::class, 'buku_id');
}



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanBuku extends Model
{
    protected $table = 'permintaan_buku';

    protected $fillable = [
        'petugas_id',
        'judul',
        'penulis',
        'penerbit',
        'tahun',
        'stok',
        'kategori_id',
        'halaman',
        'deskripsi',
        'cover',
        'alasan',
        'status',
    ];

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

public function getPetugasNameAttribute()
{
    // Jika petugas_id = 1 (admin) padahal judul bukan dari admin
    if ($this->petugas_id == 1 && $this->role !== 'admin') {
        return "Petugas Tidak Diketahui";
    }

    return $this->petugas->nama ?? '—';
}

}

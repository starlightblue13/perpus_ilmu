<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuDitolak extends Model
{
    protected $table = 'buku_ditolak';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'cover',
        'alasan_penolakan'
    ];
}
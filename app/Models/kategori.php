<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',        // nama kategori buku
    ];

    // Satu kategori memiliki banyak buku
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}

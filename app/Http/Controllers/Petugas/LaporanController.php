<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Buku;

class LaporanController extends Controller
{
    public function cetak()
    {
        $buku = Buku::all();

        $pdf = Pdf::loadView('petugas.laporan.cetak', compact('buku'));
        return $pdf->download('laporan-buku.pdf');
    }
}

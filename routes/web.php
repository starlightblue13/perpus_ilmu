<?php

use App\Http\Controllers\Admin\BukuController;
// ====================== CONTROLLERS ======================
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
// ADMIN
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PendingController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\PermintaanBukuController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\PeminjamanController as PetugasPeminjamanController;
// PETUGAS
use App\Http\Controllers\Petugas\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Petugas\BukuController as PetugasBukuController;
use App\Http\Controllers\Petugas\LaporanController;
// SISWA
use App\Http\Controllers\Siswa\KatalogController;
use App\Http\Controllers\Siswa\ProfileController as SiswaProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    // ---------------------- BUKU ----------------------
    Route::prefix('buku')->name('buku.')->group(function () {
        Route::get('/', [BukuController::class, 'index'])->name('index');
        Route::get('/create', [BukuController::class, 'create'])->name('create');
        Route::post('/store', [BukuController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [BukuController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BukuController::class, 'destroy'])->name('delete');
    });

    // ---------------------- RIWAYAT ----------------------
    Route::get('/riwayat', [PeminjamanController::class, 'riwayat'])
        ->name('riwayat');

 // pending index
Route::get('/pending', [PendingController::class, 'index'])
    ->name('pending.index');

// pending pinjam
Route::post('/pending/pinjam/{id}/setuju', [PendingController::class, 'setujuPinjam'])
    ->name('pending.pinjam.setuju');

Route::post('/pending/pinjam/{id}/tolak', [PendingController::class, 'tolakPinjam'])
    ->name('pending.pinjam.tolak');

// pending buku
Route::post('/pending/buku/{id}/setuju', [PendingController::class, 'setujuBuku'])
    ->name('pending.buku.setuju');

Route::post('/pending/buku/{id}/tolak', [PendingController::class, 'tolakBuku'])
    ->name('pending.buku.tolak');

    // ---------------------- DIPINJAM ----------------------
    Route::get('/dipinjam', [PeminjamanController::class, 'dipinjam'])
        ->name('dipinjam.index');

    Route::post('/dipinjam/{id}/ingatkan', [PeminjamanController::class, 'ingatkan'])
        ->name('dipinjam.ingatkan');

    Route::post('/dipinjam/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])
        ->name('dipinjam.kembalikan');

    // ---------------------- PERMINTAAN BUKU PETUGAS ----------------------
    Route::get('/permintaan-buku', [PermintaanBukuController::class, 'index'])
        ->name('permintaan.buku');

    Route::post('/permintaan-buku/{id}/setuju', [PermintaanBukuController::class, 'setuju'])
        ->name('permintaan.buku.setuju');

    Route::post('/permintaan-buku/{id}/tolak', [PermintaanBukuController::class, 'tolak'])
        ->name('permintaan.buku.tolak');

    // ---------------------- RATING ----------------------
    Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
    Route::get('/rating/{id}', [RatingController::class, 'detail'])->name('rating.detail');

    // ---------------------- PROFIL ADMIN ----------------------
    Route::get('/profil', [AdminDashboardController::class, 'profil'])->name('profil');
    Route::get('/profil/edit', [AdminDashboardController::class, 'profilEdit'])->name('profil.edit');
    Route::post('/profil/update', [AdminDashboardController::class, 'profilUpdate'])->name('profil.update');
    Route::get('/profil/password', [AdminDashboardController::class, 'passwordForm'])->name('profil.password');
    Route::post('/profil/password/update', [AdminDashboardController::class, 'passwordUpdate'])->name('profil.password.update');

    // ---------------------- USER & PETUGAS ----------------------
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.delete');

    Route::resource('/petugas', \App\Http\Controllers\Admin\PetugasController::class)
        ->except(['show']);

    Route::post('/buku-permintaan/{id}/setuju', [PermintaanBukuController::class, 'setuju'])
        ->name('admin.permintaan.setuju');

    Route::post('/buku-permintaan/{id}/tolak', [PermintaanBukuController::class, 'tolak'])
        ->name('admin.permintaan.tolak');

});

/*
|--------------------------------------------------------------------------
| PETUGAS ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('petugas')
    ->name('petugas.')
    ->middleware(['auth'])
    ->group(function () {

    // ================= DASHBOARD =================
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])
        ->name('dashboard');

    // ================= DATA BUKU PETUGAS =================
 Route::prefix('buku')->name('buku.')->group(function () {

        // 1. LIST DATA BUKU PETUGAS
        Route::get('/', [PetugasBukuController::class, 'index'])->name('index');

        // 2. TAMBAH BUKU
        Route::get('/tambah', [PetugasBukuController::class, 'tambah'])->name('tambah');
        Route::post('/store', [PetugasBukuController::class, 'store'])->name('store');

        // 3. STATUS PERMINTAAN
        Route::get('/pending', [PetugasBukuController::class, 'pending'])->name('pending');
        Route::get('/disetujui', [PetugasBukuController::class, 'disetujui'])->name('disetujui');
        Route::get('/ditolak', [PetugasBukuController::class, 'ditolak'])->name('ditolak');

        // 4. EDIT/UPDATE/HAPUS (HARUS PALING BAWAH)
        Route::get('/{id}/edit', [PetugasBukuController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [PetugasBukuController::class, 'update'])->name('update');
        Route::delete('/{id}/hapus', [PetugasBukuController::class, 'destroy'])->name('hapus');
});

    // ================= PEMINJAMAN =================
    Route::prefix('peminjaman')->name('peminjaman.')->group(function () {

        Route::get('/pending', [PetugasPeminjamanController::class, 'pending'])
            ->name('pending');

        Route::get('/dipinjam', [PetugasPeminjamanController::class, 'dipinjam'])
            ->name('dipinjam');

        Route::get('/dikembalikan', [PetugasPeminjamanController::class, 'dikembalikan'])
            ->name('dikembalikan');

        Route::get('/ditolak', [PetugasPeminjamanController::class, 'ditolak'])
            ->name('ditolak');

        Route::get('/belum-diambil', [PetugasPeminjamanController::class, 'belumDiambil'])
            ->name('belum_diambil');

        Route::post('/{id}/setuju', [PetugasPeminjamanController::class, 'setuju'])
            ->name('setuju');

        Route::post('/{id}/tolak', [PetugasPeminjamanController::class, 'tolak'])
            ->name('tolak');

        Route::post('/{id}/ingatkan', [PetugasPeminjamanController::class, 'ingatkan'])
            ->name('ingatkan');

        Route::post('/{id}/terima', [PetugasPeminjamanController::class, 'terimaBuku'])
            ->name('terima');

        Route::post('/{id}/diambil', [PetugasPeminjamanController::class, 'sudahDiambil'])
            ->name('diambil');

        Route::post('/{id}/sudah-diterima', [PetugasPeminjamanController::class, 'sudahDiterima'])
            ->name('sudah_diterima');

        Route::delete('/{id}/hapus', [PetugasPeminjamanController::class, 'hapus'])
            ->name('hapus');
    });

    // ================= SISWA =================
    Route::get('/siswa', [\App\Http\Controllers\Petugas\SiswaController::class, 'index'])
        ->name('siswa.index');

    // ================= RATING =================
    Route::get('/rating', [\App\Http\Controllers\Petugas\RatingController::class, 'index'])
        ->name('rating.index');

    // ================= PROFIL =================
    Route::get('/profil', [ProfilController::class, 'index'])
        ->name('profil');

    Route::get('/profil/edit', [ProfilController::class, 'edit'])
        ->name('profil.edit');

    Route::post('/profil/update', [ProfilController::class, 'update'])
        ->name('profil.update');

    Route::get('/profil/password', [ProfilController::class, 'passwordForm'])
        ->name('profil.password');

    Route::post('/profil/password/update', [ProfilController::class, 'passwordUpdate'])
        ->name('profil.password.update');

Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])
         ->name('laporan.cetak');
});

/*
|--------------------------------------------------------------------------
| SISWA ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('siswa')->name('siswa.')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');

    Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');
    Route::get('/buku/{id}', [KatalogController::class, 'detail'])->name('buku.detail');
    Route::get('/buku/{id}/pinjam', [KatalogController::class, 'pinjam'])->name('buku.pinjam');

    Route::post('/buku/{id}/ajukan', [KatalogController::class, 'ajukan'])->name('buku.ajukan');

    Route::get('/peminjaman/popup', [KatalogController::class, 'popupMenunggu'])->name('peminjaman.popup');

    Route::get('/peminjaman', [KatalogController::class, 'peminjamanSaya'])->name('peminjaman.saya');
    Route::get('/peminjaman/{id}/kartu', [KatalogController::class, 'kartu'])->name('peminjaman.kartu');
    Route::post('/peminjaman/{id}/batalkan', [KatalogController::class, 'batalkan'])->name('peminjaman.batalkan');
    Route::get('/peminjaman/{id}/ditolak', [KatalogController::class, 'popupDitolak'])->name('peminjaman.ditolak');

    Route::get('/riwayat', [KatalogController::class, 'riwayat'])->name('riwayat');
    Route::get('/riwayat/{id}/rating', [KatalogController::class, 'beriRating'])->name('riwayat.rating');
    Route::post('/riwayat/{id}/rating', [KatalogController::class, 'simpanRating'])->name('riwayat.rating.simpan');
    Route::get('/riwayat/{id}/lihat-rating', [KatalogController::class, 'lihatRating'])->name('riwayat.rating.lihat');

    Route::get('/profil', [SiswaProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [SiswaProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [SiswaProfilController::class, 'update'])->name('profil.update');

    // Route::get('/profile/edit', [ProfileController::class, 'edit'])
    //     ->name('profil.edit');

    // Route::post('/siswa/profile/update', [ProfileController::class, 'update'])
    //     ->name('profil.update');
});

/*
|--------------------------------------------------------------------------
| Profile Breeze
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

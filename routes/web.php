<?php

use App\Http\Controllers\PublikController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CPController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Rute Publik
// Route::get('/', function () {
//     return redirect('/comingsoon');
// });

Route::get('/', [PublikController::class, 'beranda'])->name('beranda.publik');

Route::get('/produk', [PublikController::class, 'produk'])->name('produk.publik');

Route::get('/produk/detail/{id}', [ProdukController::class, 'show'])->name('produk.detail');

Route::get('/berita', [PublikController::class, 'berita'])->name('berita.publik');

Route::get('/berita/detail/{id}', [BeritaController::class, 'show'])->name('berita.detail');

Route::get('/kontak', [PublikController::class, 'kontak'])->name('kontak.publik');

Route::get('/tentang', [PublikController::class, 'tentang'])->name('tentang.publik');

Route::get('/comingsoon', [PublikController::class, 'coming'])->name('coming.publik');

// Rute Admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dash');
    Route::get('/admin/profil/edit', [AdminController::class, 'editProf'])->name('prof.edit');
    Route::post('/admin/profil/updateProfil', [AdminController::class, 'updateProf'])->name('prof.update');
    Route::get('/admin/profil/editSandi', [AdminController::class, 'editPass'])->name('prof.edit.pass');
    Route::post('/admin/profil/updateSandi', [AdminController::class, 'updatePass'])->name('prof.update.pass');

    Route::get('/admin/berita', [BeritaController::class, 'index'])->name('berita.data');
    Route::get('/admin/berita/tambah', [BeritaController::class, 'create'])->name('berita.tambah');
    Route::post('/admin/berita/add', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/admin/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/admin/berita/update/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::get('/admin/berita/hapus/{id}', [BeritaController::class, 'destroy'])->name('berita.hapus');

    Route::get('/admin/produk', [ProdukController::class, 'index'])->name('produk.data');
    Route::get('/admin/produk/tambah', [ProdukController::class, 'create'])->name('produk.tambah');
    Route::post('/admin/produk/add', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/admin/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/admin/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/admin/produk/hapus/{id}', [ProdukController::class, 'destroy'])->name('produk.hapus');

    Route::get('/admin/harga', [HargaController::class, 'index'])->name('harga.data');
    Route::get('/admin/harga/tambah', [HargaController::class, 'create'])->name('harga.tambah');
    Route::post('/admin/harga/add', [HargaController::class, 'store'])->name('harga.store');
    Route::get('/admin/harga/edit/{id}', [HargaController::class, 'edit'])->name('harga.edit');
    Route::post('/admin/harga/update/{id}', [HargaController::class, 'update'])->name('harga.update');
    Route::get('/admin/harga/hapus/{id}', [HargaController::class, 'destroy'])->name('harga.hapus');

    Route::get('/admin/cp', [CPController::class, 'index'])->name('cp.data');
    Route::get('/admin/cp/tambah', [CPController::class, 'create'])->name('cp.tambah');
    Route::post('/admin/cp/add', [CPController::class, 'store'])->name('cp.store');
    Route::get('/admin/cp/edit/{id}', [CPController::class, 'edit'])->name('cp.edit');
    Route::post('/admin/cp/update/{id}', [CPController::class, 'update'])->name('cp.update');
    Route::get('/admin/cp/hapus/{id}', [CPController::class, 'destroy'])->name('cp.hapus');

    Route::get('/admin/akun', [AkunController::class, 'index'])->name('akun.data');
    Route::get('/admin/akun/tambah', [AkunController::class, 'create'])->name('akun.tambah');
    Route::post('/admin/akun/add', [AkunController::class, 'store'])->name('akun.store');
    Route::get('/admin/akun/edit/{id}', [AkunController::class, 'edit'])->name('akun.edit');
    Route::post('/admin/akun/update/{id}', [AkunController::class, 'update'])->name('akun.update');
    Route::get('/admin/akun/hapus/{id}', [AkunController::class, 'destroy'])->name('akun.hapus');
    Route::get('/admin/akun/resetPass/{id}', [AkunController::class, 'resetPass'])->name('akun.resetpass');

    Route::get('/admin/mhs', [MhsController::class, 'index'])->name('mhs.data');
    Route::get('/admin/mhs/tambah', [MhsController::class, 'create'])->name('mhs.tambah');
    Route::post('/admin/mhs/add', [MhsController::class, 'store'])->name('mhs.store');
    // Route::get('/admin/cp/edit/{id}', [CPController::class, 'edit'])->name('cp.edit');
    // Route::post('/admin/cp/update/{id}', [CPController::class, 'update'])->name('cp.update');
    // Route::get('/admin/cp/hapus/{id}', [CPController::class, 'destroy'])->name('cp.hapus');

});

require __DIR__.'/auth.php';

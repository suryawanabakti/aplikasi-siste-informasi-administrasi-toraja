<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminPengajuanSuratController;
use App\Http\Controllers\ApprovePengajuanSuratController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfileController;
use App\Models\PermohonanSurat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin/dashboard', function () {
    $jumlahPendaftar = User::whereHas('masyarakat', function ($query) {
        $query->where('status', 'diproses');
    })->count();
    $jumlahMasyarakat = User::whereHas('masyarakat', function ($query) {
        $query->where('status', 'diterima');
    })->count();
    $jumlahPermohonan = PermohonanSurat::count();

    return view('admin.dashboard', compact('jumlahPendaftar', 'jumlahMasyarakat', 'jumlahPermohonan'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/masyarakat/dashboard', function () {

    if (auth()->user()->roles[0] == 'kepala desa') {
        return redirect('/kepaladesa/dashboard');
    }
    return view('masyarakat.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.masyarakat');

Route::get('/kepaladesa/dashboard', function () {
    return view('kepaladesa.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.kepaladesa');


Route::get('/surat/{uuid}', function ($uuid) {
    $permohonanSurat =  PermohonanSurat::where('uuid', $uuid)->first();
    if ($permohonanSurat->jenis_surat == 'Surat Keterangan Kematian') {
        return view('template-surat-spp', compact('permohonanSurat'));
    }
    return view('template-surat', compact('permohonanSurat'));
})->middleware(['auth', 'verified'])->name('surat');

Route::middleware('auth')->group(function () {

    Route::get('/admin/master-data/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/master-data/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/master-data/users/{user}', [UserController::class, 'show'])->name('admin.users.show');

    Route::get('/admin/pengajuan-surat-skk', [AdminPengajuanSuratController::class, 'indexSkk'])->name('admin.pengajuan-surat-skk.index');
    Route::get('/admin/pengajuan-surat-spp', [AdminPengajuanSuratController::class, 'indexSpp'])->name('admin.pengajuan-surat-spp.index');
    Route::patch('/admin/pengajuan-surat/{permohonanSurat}', [AdminPengajuanSuratController::class, 'update'])->name('admin.pengajuan-surat.update');

    Route::get('/admin/pendaftar', [PendaftarController::class, 'index'])->name('admin.pendaftar.index');
    Route::get('/admin/pendaftar/{user}/terima', [PendaftarController::class, 'terima'])->name('admin.pendaftar.terima');
    Route::get('/admin/pendaftar/{user}/tolak', [PendaftarController::class, 'tolak'])->name('admin.pendaftar.tolak');

    Route::get('/admin/masyarakat', [MasyarakatController::class, 'index'])->name('admin.masyarakat.index');

    Route::get('/masyarakat/pengajuan-surat', [PengajuanSuratController::class, 'index'])->name('masyarakat.pengajuan-surat.index');
    Route::post('/masyarakat/pengajuan-surat', [PengajuanSuratController::class, 'store'])->name('masyarakat.pengajuan-surat.store');

    Route::get('/masyarakat/pengajuan-surat/create', [PengajuanSuratController::class, 'create'])->name('masyarakat.pengajuan-surat.create');

    Route::get('/kepaladesa/pengajuan-surat', [ApprovePengajuanSuratController::class, 'index'])->name('kepaladesa.pengajuan-surat.index');
    Route::get('/kepaladesa/pengajuan-surat/{pengajuan}/terima', [ApprovePengajuanSuratController::class, 'terima'])->name('kepaladesa.pengajuan-surat.terima');
    Route::get('/kepaladesa/pengajuan-surat/{pengajuan}/tolak', [ApprovePengajuanSuratController::class, 'tolak'])->name('kepaladesa.pengajuan-surat.tolak');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

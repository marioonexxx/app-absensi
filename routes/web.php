<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaOrtuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ROLE ADMIN

Route::middleware('auth', 'Admin', 'verified')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');    
    Route::get('/rekapan-absen',[AbsensiController::class, 'rekap'])->name('absensi.rekap');
    Route::resource('siswa', SiswaController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('sesi', SesiController::class);    
    // Tampilkan form kosong
    Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');    
    // Ambil data berdasarkan NISN dari input form
    Route::get('/absen/read', [AbsenController::class, 'read'])->name('absen.read');  
    
});



// ROLE KEPSEK
Route::middleware('auth', 'Kepsek', 'verified')->group(function(){
    Route::get('/kepsek/dashboard',[KepsekController::class, 'index'])->name('kepsek.dashboard');

});


// ROLE PETUGAS ABSEN

Route::middleware('auth','Petugas', 'verified')->group(function(){
    Route::get('/petugas/dashboard',[PetugasController::class, 'index'])->name('petugas.dashboard');
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');

    

    Route::post('/absensi/read',[AbsensiController::class, 'store'])->name('absensi.store');
});


// ROLE SISWA DAN ORANG TUA MURID

Route::middleware('auth','Siswa','verified')->group(function(){
    Route::get('/siswa-orangtua/dashboard',[SiswaOrtuController::class, 'index'])->name('siswa.dashboard');
});


require __DIR__ . '/auth.php';

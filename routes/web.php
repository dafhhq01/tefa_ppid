<?php

use App\Http\Controllers\Public\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;

// Route::get('/', function () {
//     return view('public.home');
// });

Route::get('/', [HomeController::class, 'index']);



Route::get('/', function () {
    return view('welcome');
});

// Halaman utama profil
Route::get('/profil', [ProfileController::class, 'index'])
    ->name('profile.index');

// Halaman Profil PPID
Route::get('/profil-ppid', [ProfileController::class, 'detail'])
    ->defaults('slug', 'profil-ppid')
    ->name('profile.ppid');

// Halaman Profil Sekolah
Route::get('/profil-sekolah', [ProfileController::class, 'detail'])
    ->defaults('slug', 'profil-sekolah')
    ->name('profile.school');

// Halaman Visi dan Misi
Route::get('/visi-misi', [ProfileController::class, 'detail'])
    ->defaults('slug', 'visi-misi')
    ->name('profile.vision');

// Halaman Tugas dan Fungsi
Route::get('/tugas-fungsi', [ProfileController::class, 'detail'])
    ->defaults('slug', 'tugas-fungsi')
    ->name('profile.duties');

// Halaman Struktur Organisasi
Route::get('/struktur-organisasi', [ProfileController::class, 'organization'])
    ->name('profile.organization');

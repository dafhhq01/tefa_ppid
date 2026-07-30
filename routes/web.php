<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProfileController;

// ==========================
// FE1 - HOME
// ==========================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ==========================
// FE2 - PROFILE
// ==========================

Route::get('/profil', [ProfileController::class, 'index'])
    ->name('profile.index');

Route::get('/profil/{slug}', [ProfileController::class, 'detail'])
    ->whereIn('slug', [
        'profil-ppid',
        'profil-sekolah',
        'visi-misi',
        'tugas-fungsi',
    ])
    ->name('profile.detail');

Route::get(
    '/struktur-organisasi',
    [ProfileController::class, 'organization']
)->name('profile.organization');
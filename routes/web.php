<?php

use App\Http\Controllers\Public\PublicationController;

Route::get('/publikasi', [PublicationController::class, 'index'])->name('publication.index');
Route::get('/berita', [PublicationController::class, 'news'])->name('news.index');
Route::get('/berita/{slug}', [PublicationController::class, 'detail'])->name('news.detail');
Route::get('/laporan', [PublicationController::class, 'publication'])->name('publication.report');
Route::get('/download', [PublicationController::class, 'document'])->name('document.index');
Route::get('/pengadaan', [PublicationController::class, 'procurement'])->name('procurement.index');
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;

// Route::get('/', function () {
//     return view('public.home');
// });

Route::get('/', [HomeController::class, 'index']);




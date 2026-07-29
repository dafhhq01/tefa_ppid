<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;


Route::get('/', function () {
    return view('welcome');
});

// Rute Utama Layanan Publik PPID
Route::get('/service', [ServiceController::class, 'index'])->name('public.service.index');

// Daftar Informasi Publik
Route::get('/service/information', [ServiceController::class, 'informationList'])->name('public.service.information-list');

// permohonan informasi
Route::get('/permohonan-informasi', [ServiceController::class, 'requestForm'])->name('public.service.request-form');

Route::post('/permohonan-informasi', [ServiceController::class, 'submitRequest'])->name('public.service.request-form.submit');   

// Pengaduan Masyarakat
Route::get('/pengaduan', [ServiceController::class, 'complaintForm'])->name('public.service.complaint-form');
Route::post('/pengaduan', [ServiceController::class, 'storeComplaint'])->name('public.service.store-complaint');

// Halaman tracking
Route::get('/service/tracking', [ServiceController::class, 'trackingform'])->name('public.service.tracking');
Route::post('/service/tracking', [ServiceController::class, 'trackingResult'])->name('public.service.tracking.check');

// Halaman succsess
Route::get('/success', function () {
    return view('public.service.success');
})->name('public.service.success');
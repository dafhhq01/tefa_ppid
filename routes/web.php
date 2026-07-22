<?php

use App\Http\Controllers\PublicServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/permohonan-informasi', [PublicServiceController::class, 'storeRequest'])->name('public.service.request.store');
Route::post('/pengaduan', [PublicServiceController::class, 'trackComplaint'])->name('public.service.complaint.store');
Route::get('/tracking{ticket}', [PublicServiceController::class, 'trackRequest'])->name('public.service.tracking.request');
Route::get('/tracking-pengaduan{ticket}', [PublicServiceController::class, 'trackComplaint'])->name('public.service.tracking.complaint');
<?php

use App\Http\Controllers\PublicServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/permohonan-informasi', [PublicServicesController::class, 'storeRequest'])->name('public.service.request.store');
Route::post('/pengaduan', [PublicServicesController::class, 'trackComplaint'])->name('public.service.complaint.store');
Route::get('/tracking{ticket}', [PublicServicesController::class, 'trackRequest'])->name('public.service.tracking.request');
Route::get('/tracking-pengaduan{ticket}', [PublicServicesController::class, 'trackComplaint'])->name('public.service.tracking.complaint');
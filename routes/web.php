<?php

use App\Http\Controllers\PublicServiceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InformationCategoryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\RegulationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Informasi & regulasi (BE3)
Route::resource('information-categories', InformationCategoryController::class);
Route::resource('informations', InformationController::class);
Route::resource('regulations', RegulationController::class);
Route::resource('faqs', FaqController::class);

// Layanan PPID (BE5)
Route::post('/permohonan-informasi', [PublicServiceController::class, 'storeRequest'])->name('public.service.request.store');
Route::post('/pengaduan', [PublicServiceController::class, 'storeComplaint'])->name('public.service.complaint.store');
Route::get('/tracking/{ticket}', [PublicServiceController::class, 'trackRequest'])->name('public.service.tracking.request');
Route::get('/tracking-pengaduan/{ticket}', [PublicServiceController::class, 'trackComplaint'])->name('public.service.tracking.complaint');
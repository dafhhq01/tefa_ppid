<?php

use App\Http\Controllers\PublicServiceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InformationCategoryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\RegulationController;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\Publication;
use App\Models\Document;
use App\Models\ProcurementPackage;

Route::get('/', function () {
    return view('welcome');
});


// Test route integrasi frontend (BE4)
Route::get('/test-fe', function () {
    return view('test-fe', [
        // Query FE1 (Homepage): 3 Berita Featured
        'featured_news' => News::where('is_featured', true)->latest()->limit(3)->get(),

        // Query FE4: List Berita
        'news_list' => News::latest()->paginate(10),

        // Query FE4: List Publikasi
        'publications' => Publication::latest()->get(),

        // Query FE4: List Dokumen
        'documents' => Document::all(),

        // Query FE4: Pengadaan Induk (RUP) beserta anak paketnya
        'procurements' => ProcurementPackage::whereNull('parent_id')->with('children')->get(),
    ]);
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
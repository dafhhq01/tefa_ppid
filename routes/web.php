<?php
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\Publication;
use App\Models\Document;
use App\Models\ProcurementPackage;

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

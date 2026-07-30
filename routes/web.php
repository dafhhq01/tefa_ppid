<?php

use App\Http\Controllers\Public\InformationController;

Route::prefix('informasi')->name('information.')->group(function () {
    Route::get('/', [InformationController::class, 'index'])->name('index');
    Route::get('/{kategori}', [InformationController::class, 'category'])->name('category');
    Route::get('/detail/{slug}', [InformationController::class, 'detail'])->name('detail');
});

Route::get('/', function () {
    return redirect('/informasi');
});

Route::get('/regulasi', [InformationController::class, 'regulation'])->name('regulation.index');
Route::get('/faq', [InformationController::class, 'faq'])->name('faq.index');
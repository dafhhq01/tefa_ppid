<?php

use App\Http\Controllers\InformationCategoryController;
use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('information-categories', InformationCategoryController::class);
Route::resource('informations', InformationController::class);
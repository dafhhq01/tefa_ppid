<?php

use App\Http\Controllers\InformationCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('information-categories', InformationCategoryController::class);
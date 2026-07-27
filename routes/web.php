<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;

// Route::get('/', function () {
//     return view('public.home');
// });

Route::get('/', [HomeController::class, 'index']);




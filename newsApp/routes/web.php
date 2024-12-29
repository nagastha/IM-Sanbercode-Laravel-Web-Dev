<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CastsController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;


Route::get('/', [DashboardController::class, "Index"]);

Route::get('/table', function() {
    return view('page.table');
});

Route::get('/data-table', function() {
    return view('page.data-table');
});

Route::get('/cast/create', [CastsController::class, 'create']);

//insert data ke database

Route::post('/cast', [CastsController::class, 'store']);

//R=>read data
//route yang menampilkan database ke halaman brower

Route::get('/cast', [CastsController::class, 'index']);

//crud genrecontroller

Route::resource('genres', GenreController::class);

//crud film controller

Route::resource('films', FilmController::class);

Auth::routes();


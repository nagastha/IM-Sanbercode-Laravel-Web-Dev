<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CastsController;


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
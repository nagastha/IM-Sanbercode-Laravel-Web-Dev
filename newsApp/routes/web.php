<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, "Index"]);

Route::get('/table', function() {
    return view('page.table');
});

Route::get('/data-table', function() {
    return view('page.data-table');
});


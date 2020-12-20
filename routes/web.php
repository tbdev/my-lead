<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Products\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/show-list', [ProductController::class, 'showList']);
});
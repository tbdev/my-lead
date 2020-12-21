<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Products\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

// Route::middleware(['auth:sanctum'])->group(['prefix'=>'admin/product', 'as'=>'admin.product.'], 
//     function(){
//         Route::get('update/{id}', [ProductController::class, 'update'])->name('update');
// });

// Route::middleware('auth:sanctum')->group(function () {

// Route::group(['prefix'=>'admin/product', 'as'=>'admin.product.'], 
// Route::get('update/{id}', [ProductController::class, 'update'])->name('update');

Route::middleware('auth:sanctum')->group(function () {
  
    Route::prefix('admin')->group(function () {

        Route::prefix('product')->group(function () {
        
            Route::get('edit/{id}', [ProductController::class, 'edit'])->where('id', '[0-9]+')->name('product.edit');
            Route::put('update', [ProductController::class, 'update'])->name('product.update');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            Route::get('new', [ProductController::class, 'add'])->name('product.new');
            Route::post('store', [ProductController::class, 'store'])->name('product.store');

        });
    });

});

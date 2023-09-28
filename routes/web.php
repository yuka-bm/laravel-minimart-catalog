<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [ProductController::class, 'index'])->name('index');

    Route::group(['prefix' => 'section', 'as' => 'section.'], function() {
        Route::get('/', [SectionController::class, 'index'])->name('index');
        Route::post('/store', [SectionController::class, 'store'])->name('store');
        Route::delete('/{id}/destroy', [SectionController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function() {
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('destroy');
    });
});
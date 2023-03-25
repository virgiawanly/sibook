<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', DashboardController::class);

Route::middleware('ajax')->group(function () {
    Route::get('categories/select2', [CategoryController::class, 'select2'])->name('categories.select2');
});

Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);

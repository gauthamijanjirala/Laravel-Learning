<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/', [dashboardController::class, 'dashboard'])->name('files.dashboard');
Route::get('/', [ProductController::class, 'index'])->name('products.index');    
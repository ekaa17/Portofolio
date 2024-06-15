<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. Rute-rute
| ini dimuat oleh RouteServiceProvider dan semuanya akan ditugaskan ke grup
| middleware "web". Buat sesuatu yang hebat!
|
*/

// Autentikasi routes (login, register, dll)
Auth::routes();

// Route untuk halaman landing
Route::get('/', [HomeController::class, 'landing'])->name('landing');

// Route untuk halaman home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route untuk halaman produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route Create Product
Route::get('/create', [ProductController::class, 'create'])->name('products.create');

// Route Simpam Product
Route::post('/store', [ProductController::class, 'store'])->name('products.store');
Route::post('/update', [ProductController::class, 'update'])->name('products.update');

// Route edit Product
Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');

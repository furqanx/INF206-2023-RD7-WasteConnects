<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

// Halaman utama yang menampilkan semua produk
Route::get('/', [ProductController::class, 'index'])->name('products');

// Melihat info profile berdasarkan id
Route::get('/user/{id?}', [UserController::class, 'show'])->name('user.show');

// Untuk Melihat Products dari user tertentu.
Route::get('/user/{id}/products', [UserController::class, 'userProducts'])->name('user.products');

// Melihat info product berdasarkan id
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

/*
-pada Laravel Breeze, rute untuk halaman login dan register dapat ditemukan di dalam file routes/auth.php.
-route setelah login dapat diubah pada RouteServiceProvider::HOME
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Untuk Melihat Product Sendiri
    Route::get('/myproducts', [ProductController::class, 'myproducts'])->name('myproducts');
    
});

require __DIR__ . '/auth.php';
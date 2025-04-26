<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', function () {
    return view('front.index');
})->name('home');

// Halaman About
Route::get('/about', function () {
    return view('front.about');
})->name('about');

// Halaman Peminjaman Buku
Route::get('/book', [FrontController::class, 'book'])->name('book');

// Proses Peminjaman
Route::post('/peminjaman', [FrontController::class, 'store'])->name('peminjaman');

// Proses Pengembalian
Route::put('/pengembalian/{id}', [FrontController::class, 'returnBook'])->name('pengembalian');

// Dashboard (Hanya untuk user yang sudah login dan terverifikasi)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile - Hanya untuk user yang login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route auth dari Laravel Breeze / Fortify / Jetstream
require __DIR__.'/auth.php';
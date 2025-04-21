<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;


Route::get('/', function () {
    return view('.front.index');
});

Route::get('/about', function () {
    return view('.front.about');
});
Route::get('/book', [FrontController::class, 'book']);

Route::post('/peminjaman', [FrontController::class, 'store'])->name('peminjaman');
Route::put('/pengembalian/{id}', [FrontController::class, 'returnBook'])->name('pengembalian');
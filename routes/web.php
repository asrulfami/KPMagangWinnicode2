<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Halaman welcome (bisa diganti nanti)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard protected dengan auth dan verified
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route yang menggunakan middleware auth
Route::middleware(['auth', 'verified'])->group(function () {

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes untuk categories dan transactions (hanya index, create, store)
    Route::resource('categories', CategoryController::class)->only(['index', 'create', 'store']);
    Route::resource('transactions', TransactionController::class)->only(['index', 'create', 'store']);

    // Route laporan keuangan
    Route::get('laporan', [ReportController::class, 'index'])->name('laporan');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

    
Route::get('/', function () {
    return view('auth.login');
});
// Rute untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses data dari form login
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh rute yang dilindungi (hanya bisa diakses setelah login)
Route::get('/dashboard', function () {
    return 'Selamat datang, ' . auth()->user()->nama_lengkap;
})->middleware('auth');
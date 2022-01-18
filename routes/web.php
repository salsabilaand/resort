<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardPemilikController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard-pemilik', [App\Http\Controllers\DashboardPemilikController::class, 'index'])->name('dashboard-pemilik');

//Route Login
Route::get('/login', [App\Http\Controllers\CustomAuthController::class, 'login']);
Route::get('/registration', [App\Http\Controllers\CustomAuthController::class, 'registration']);
Route::post('/registration-user', [App\Http\Controllers\CustomAuthController::class, 'registrationUser'])->name('register-user');
Route::post('/login-user', [App\Http\Controllers\CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [App\Http\Controllers\CustomAuthController::class, 'dashboard']);
Route::get('/coba', function () {
    return view('auth.coba');
});

//Route Kamar
Route::get('/data-kamar', [App\Http\Controllers\KamarController::class, 'index'])->name('data-kamar');
Route::get('/input-kamar', [App\Http\Controllers\KamarController::class, 'create'])->name('input-kamar');
Route::post('/input-proses-kamar', [App\Http\Controllers\KamarController::class, 'store'])->name('input-proses-kamar');
Route::get('/edit-kamar/{id}', [App\Http\Controllers\KamarController::class, 'edit'])->name('edit-kamar');
Route::post('/edit-proses-kamar/{id}', [App\Http\Controllers\KamarController::class, 'update'])->name('edit-proses-kamar');
Route::get('/hapus-kamar/{id}', [App\Http\Controllers\KamarController::class, 'destroy'])->name('hapus-kamar');

//Route Transaksi
Route::get('/data-transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('data-transaksi');
Route::get('/input-transaksi', [App\Http\Controllers\TransaksiController::class, 'create'])->name('input-transaksi');
Route::post('/input-proses-transaksi', [App\Http\Controllers\TransaksiController::class, 'store'])->name('input-proses-transaksi');
Route::get('/edit-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'edit'])->name('edit-transaksi');
Route::post('/edit-proses-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'update'])->name('edit-proses-transaksi');
Route::get('/hapus-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'destroy'])->name('hapus-transaksi');
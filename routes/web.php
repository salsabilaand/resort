<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Login
Route::get('/login', [CustomAuthController::class, 'login']);
Route::get('/registration', [CustomAuthController::class, 'registration']);
Route::post('/registration-user', [CustomAuthController::class, 'registrationUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
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
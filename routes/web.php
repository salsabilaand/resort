<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardPemilikController;
use App\Http\Controllers\KontenBerandaController;

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
// Route::get('/dashboard-admin', [App\Http\Controllers\DashboardAdminController::class, 'index'])->name('dashboard-admin');

//Route Login
Route::get('/login', [App\Http\Controllers\CustomAuthController::class, 'login']);
Route::get('/registration', [App\Http\Controllers\CustomAuthController::class, 'registration']);
Route::post('/registration-user', [App\Http\Controllers\CustomAuthController::class, 'registrationUser'])->name('register-user');
Route::post('/login-user', [App\Http\Controllers\CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [App\Http\Controllers\CustomAuthController::class, 'dashboard']);
Route::get('/coba', function () {
    return view('auth.coba');
});
Route::get('/logout', ['as' => 'logout', function (){
    if(session()->has('loginId')){
        session()->pull('loginId');
        session()->pull('loginName');
        return redirect('login');
    }
}]);

//route profil resort
Route::get('/profile-resort', [App\Http\Controllers\CustomAuthController::class, 'profile'])->name('profile-resort');
Route::post('/update-profile-resort/{id}', [App\Http\Controllers\CustomAuthController::class, 'update'])->name('update-profile-resort');
Route::post('/update-password-pemilik-resort/{id}', [App\Http\Controllers\CustomAuthController::class, 'update_password'])->name('update-password-pemilik-resort');

//Route Kamar
Route::get('/data-kamar', [App\Http\Controllers\KamarController::class, 'index'])->name('data-kamar');
Route::get('/input-kamar', [App\Http\Controllers\KamarController::class, 'create'])->name('input-kamar');
Route::post('/input-proses-kamar', [App\Http\Controllers\KamarController::class, 'store'])->name('input-proses-kamar');
Route::get('/edit-kamar/{id}', [App\Http\Controllers\KamarController::class, 'edit'])->name('edit-kamar');
Route::post('/edit-proses-kamar/{id}', [App\Http\Controllers\KamarController::class, 'update'])->name('edit-proses-kamar');
Route::get('/hapus-kamar/{id}', [App\Http\Controllers\KamarController::class, 'destroy'])->name('hapus-kamar');

//Route Konten Beranda
Route::get('/data-konten-beranda', [App\Http\Controllers\KontenBerandaController::class, 'index'])->name('data-konten-beranda');
Route::get('/input-konten-beranda', [App\Http\Controllers\KontenBerandaController::class, 'create'])->name('input-konten-beranda');
Route::post('/input-proses-konten-beranda', [App\Http\Controllers\KontenBerandaController::class, 'store'])->name('input-proses-konten-beranda');
Route::get('/edit-konten-beranda/{id}', [App\Http\Controllers\KontenBerandaController::class, 'edit'])->name('edit-konten-beranda');
Route::post('/edit-proses-konten-beranda/{id}', [App\Http\Controllers\KontenBerandaController::class, 'update'])->name('edit-proses-konten-beranda');
Route::get('/hapus-konten-beranda/{id}', [App\Http\Controllers\KontenBerandaController::class, 'destroy'])->name('hapus-konten-beranda');

//Route Transaksi
Route::get('/data-transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('data-transaksi');
Route::get('/input-transaksi', [App\Http\Controllers\TransaksiController::class, 'create'])->name('input-transaksi');
Route::post('/input-proses-transaksi', [App\Http\Controllers\TransaksiController::class, 'store'])->name('input-proses-transaksi');
Route::get('/edit-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'edit'])->name('edit-transaksi');
Route::post('/edit-proses-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'update'])->name('edit-proses-transaksi');
Route::get('/hapus-transaksi/{id}', [App\Http\Controllers\TransaksiController::class, 'destroy'])->name('hapus-transaksi');
Route::get('/laporan-transaksi', [App\Http\Controllers\TransaksiController::class, 'laporan'])->name('laporan-transaksi');
Route::get('/cetak-laporan-transaksi', [App\Http\Controllers\TransaksiController::class, 'cetak'])->name('cetak-laporan-transaksi');

//Route Admin
Route::get('/data-pemilik-resort', [App\Http\Controllers\DataPemilikResortController::class, 'index'])->name('data-pemilik-resort');
Route::get('/input-pemilik-resort', [App\Http\Controllers\DataPemilikResortController::class, 'create'])->name('input-pemilik-resort');
Route::post('/input-proses-pemilik-resort', [App\Http\Controllers\DataPemilikResortController::class, 'registrationUser'])->name('input-proses-pemilik-resort');
Route::get('/edit-pemilik-resort/{id}', [App\Http\Controllers\DataPemilikResortController::class, 'edit'])->name('edit-pemilik-resort');
Route::post('/edit-proses-pemilik-resort/{id}', [App\Http\Controllers\DataPemilikResortController::class, 'update'])->name('edit-proses-pemilik-resort');
Route::get('/hapus-pemilik-resort/{id}', [App\Http\Controllers\DataPemilikResortController::class, 'destroy'])->name('hapus-pemilik-resort');
Route::get('/cetak-pemilik-resort', [App\Http\Controllers\DataPemilikResortController::class, 'cetak'])->name('cetak-pemilik-resort');

//Route Pengunjung
Route::get('/beranda-pengunjung', [App\Http\Controllers\PengunjungController::class, 'index'])->name('beranda-pengunjung');
Route::get('/edit-akun-pengunjung', [App\Http\Controllers\PengunjungController::class, 'editAkun'])->name('edit-akun-pengunjung');
Route::post('/edit-proses-akun-pengunjung/{id}', [App\Http\Controllers\PengunjungController::class, 'updateAkun'])->name('edit-proses-akun-pengunjung');
Route::get('/riwayat-reservasi-pengunjung', [App\Http\Controllers\PengunjungController::class, 'riwayatReservasi'])->name('riwayat-reservasi-pengunjung');
Route::get('/tampil-penginapan', [App\Http\Controllers\PengunjungController::class, 'tampilPenginapan'])->name('tampil-penginapan');
Route::get('/tampil-kamar-resort/{id}', [App\Http\Controllers\PengunjungController::class, 'tampilKamarPenginapan'])->name('tampil-kamar-resort');
Route::get('/reservasi/{id}', [App\Http\Controllers\PengunjungController::class, 'reservasi'])->name('reservasi');
Route::post('/reservasi-proses/{id}', [App\Http\Controllers\PengunjungController::class, 'inputReservasi'])->name('reservasi-proses');
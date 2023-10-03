<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/pelanggan', PelangganController::class);
Route::resource('/pemasok', PemasokController::class);
Route::resource('/barang', BarangController::class);

//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//route untuk yang sudah login
//Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::get('/contact', [HomeController::class, 'contact']);
//route untuk admin
//Route::group(['middleware' => ['cekUserLogin:1']], function(){
    Route::resource('/produk', ProdukController::class);
//});
//route untuk kasir
//Route::group(['middleware' => ['cekUserLogin:2']], function(){
    Route::resource('/pembelian', PembelianController::class);
//});

//});
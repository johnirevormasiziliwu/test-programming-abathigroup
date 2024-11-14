<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ApartemenController;

Route::get('/', function () {
    return view('welcome');


});
// Route untuk menghitung total biaya parkir;
Route::get('/parkir', [ParkirController::class, 'hitungTotalBiayaParkir'])->name('parkir');
Route::get('/parkir/{nomorPolisi}', [ParkirController::class, 'showKendaraanByNomorPolisi'])->name('parkirShow');

Route::resource('apartemen', ApartemenController::class);
Route::resource('penghuni', PenghuniController::class);





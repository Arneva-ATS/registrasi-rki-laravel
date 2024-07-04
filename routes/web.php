<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('dashboard.auth.login');
});

Route::get('/', function () {
    return redirect(route('anggota'));
});

Route::get('/anggota', function () {
    return view('registrasi.registrasi-anggota');
})->name('anggota');

Route::get('/koperasi', function () {
    return view('registrasi.registrasi-anggota');
})->name('koperasi');

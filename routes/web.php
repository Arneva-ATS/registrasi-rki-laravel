<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

Route::post('/dologin', [App\Http\Controllers\LoginController::class, 'dologin']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard', function () {
    $id = Session::get('id_koperasi');
    $username = Session::get('username');
    $password = Session::get('password');
    return view('dashboard.auth.home', compact('id','username','password'));
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

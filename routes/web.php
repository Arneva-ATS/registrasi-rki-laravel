<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/', function ($name) {
    return redirect()->route('anggota.primkop', ['name' => $name]);
});

Route::get('/anggota/primkop/{name}', function ($name) {
    $koperasi = DB::table('tbl_koperasi')->where('slug', $name)->get()->pluck('nama_koperasi');
    // return dd(is_bool($koperasi));
    if ($koperasi->isEmpty()) {
        return view('error');
    } else {
        return view('registrasi.registrasi-anggota', ['name' => $name, 'nama_koperasi' => $koperasi[0]]);
    }
})->name('anggota.primkop');

Route::get('/koperasi/rki/{tingkat}', function ($tingkat) {
    $tingkat_koperasi = DB::table('tbl_tingkat_koperasi')->where('nama_tingkatan', $tingkat)->get();
    if ($tingkat_koperasi->isEmpty()) {
        return view('error');
    } else {
        return view('registrasi.registrasi-koperasi-rki', ['tingkat' => $tingkat]);
    }
})->name('koperasi.rki');

Route::get('/koperasi/{tingkat}/{koperasi}', function ($tingkat, $name) {
    $tingkat_koperasi = DB::table('tbl_tingkat_koperasi')->where('nama_tingkatan', $tingkat)->get();
    $koperasi = DB::table('tbl_koperasi')->where('slug', $name)->get()->pluck('nama_koperasi');

    if ($tingkat_koperasi->isEmpty() && $koperasi->isEmpty()) {
        return view('error');
    } else {
        return view('registrasi.registrasi-koperasi', ['tingkat' => $tingkat, 'nama_koperasi' => $koperasi[0]]);
    }
})->name('koperasi');




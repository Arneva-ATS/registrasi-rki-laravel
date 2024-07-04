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
})->name('login');

Route::post('/dologin', [App\Http\Controllers\LoginController::class, 'dologin']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/logout', function(){
    Session::flush('id_koperasi');
    Session::flush('username');
    Session::flush('password');
    return redirect('/login');
});

Route::get('/dashboard-new', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', function () {
    $id = Session::get('id_koperasi');
    $username = Session::get('username');
    $password = Session::get('password');
    return view('dashboard.auth.home', compact('id','username','password'));
});

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Routing anggota melalui primkopnya
Route::get('/anggota/primkop/{name}', function ($name) {
    $koperasi = DB::table('tbl_koperasi')->where('slug', $name)->get()->pluck('nama_koperasi');
    // return dd(is_bool($koperasi));
    if ($koperasi->isEmpty()) {
        return view('error');
    } else {
        return view('registrasi.registrasi-anggota', ['name' => $name, 'nama_koperasi' => $koperasi[0]]);
    }
})->name('anggota.primkop');

// Routing registrasi koperasi melalui RKI
Route::get('/koperasi/rki/{tingkat}', function ($tingkat) {
    $tingkat_koperasi = DB::table('tbl_tingkat_koperasi')->where('nama_tingkatan', $tingkat)->get();
    if ($tingkat_koperasi->isEmpty()) {
        return view('error');
    } else {
        return view('registrasi.registrasi-koperasi-rki', ['tingkat' => $tingkat]);
    }
})->name('koperasi.rki');

// Routing registrasi koperasi melalui koperasi diatasnya
Route::get('/koperasi/{tingkat}/{name}', function ($tingkat, $name) {
    $koperasi = DB::table('tbl_koperasi')
        ->join('tbl_tingkat_koperasi', 'tbl_koperasi.id_tingkatan_koperasi', '=', 'tbl_tingkat_koperasi.id')
        ->where('tbl_koperasi.slug', $name)
        ->where('tbl_tingkat_koperasi.nama_tingkatan', $tingkat)
        ->get();
        // return dd($koperasi);
    if ($koperasi->isEmpty()) {
        return view('error');
    } elseif ($koperasi[0]->id_tingkatan_koperasi > 2){
        return view('error');
    }elseif ($koperasi[0]->id_tingkatan_koperasi < 3) {
        $tingkatan = $koperasi[0]->id_tingkatan_koperasi + 1;
        $tingkat_koperasi = DB::table('tbl_tingkat_koperasi')->where('id', $tingkatan)->get();
        // return dd($tingkat_koperasi);
        return view('registrasi.registrasi-koperasi', ['tingkat' => $tingkat_koperasi[0]->nama_tingkatan , 'nama_koperasi' =>$koperasi[0]->nama_koperasi]);
    }
})->name('koperasi');




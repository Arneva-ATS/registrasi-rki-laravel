<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoperasiController;
use GuzzleHttp\Psr7\Request;
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

Route::get('rki/primkop', function (Request $request) {
    return "OK";
});

Route::post('/dologin', [App\Http\Controllers\LoginController::class, 'dologin']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/logout', function () {
    Session::flush('id_koperasi');
    Session::flush('username');
    Session::flush('password');
    Session::flush('tingkatan');
    Session::flush('id_inkop');
    Session::flush('id_puskop');
    Session::flush('id_primkop');
    return redirect('/login');
});

// Route::get('/dashboard-new', function () {
//     return view('dashboard.index');
// });

Route::get('/dashboard', function () {
    $id = Session::get('id_koperasi');
    if(!empty($id)){
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        return view('dashboard.auth.home', compact('id','username','password','tingkatan'));
    }else{
        return redirect('/login');
    }
   
});


Route::get('/list_inkop', function(){
    $id = Session::get('id_koperasi');
    $username = Session::get('username');
    $password = Session::get('password');
    $tingkatan = Session::get('tingkatan');
    $id_inkop = Session::get('id_inkop');
    $id_puskop = Session::get('id_puskop');
    $id_primkop = Session::get('id_primkop');
    return view('dashboard.auth.inkop',compact('id','username','password','tingkatan'));
});

Route::get('/list_puskop', function(){
    $id = Session::get('id_koperasi');
    $username = Session::get('username');
    $password = Session::get('password');
    $tingkatan = Session::get('tingkatan');
    $id_inkop = Session::get('id_inkop');
    $id_puskop = Session::get('id_puskop');
    $id_primkop = Session::get('id_primkop');
    $puskop = DB::table('tbl_koperasi')->where('id_inkop',  $id_inkop)->get();
    return view('dashboard.auth.puskop',compact('id','username','password','tingkatan','puskop'));
});

Route::get('/list_primkop', function(){
    $id = Session::get('id_koperasi');
    $username = Session::get('username');
    $password = Session::get('password');
    $tingkatan = Session::get('tingkatan');
    $id_inkop = Session::get('id_inkop');
    $id_puskop = Session::get('id_puskop');
    $id_primkop = Session::get('id_primkop');
    $primkop = DB::table('tbl_koperasi')->where('id_puskop', $id_puskop)->get();
    return view('dashboard.auth.primkop',compact('id','username','password','tingkatan','primkop'));
});


Route::get('/list_anggota', function(){
    $id = Session::get('id_koperasi');
    $username = Session::get('username');
    $password = Session::get('password');
    $tingkatan = Session::get('tingkatan');
    $id_inkop = Session::get('id_inkop');
    $id_puskop = Session::get('id_puskop');
    $id_primkop = Session::get('id_primkop');
    $primkop_anggota = DB::table('tbl_anggota')->where('id_koperasi', $id)->get();
    return view('dashboard.auth.anggota',compact('id','username','password','tingkatan','primkop_anggota'));
});




Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Routing anggota melalui primkopnya
Route::get('/anggota/primkop/{name}', function ($name) {
    $koperasi = DB::table('tbl_koperasi')->select('nama_koperasi', 'id')->where('slug', $name)->get();
    // return dd(is_bool($koperasi));
    // return dd($tingkat_koperasi);
    if ($koperasi->isEmpty()) {
        return view('error');
    } else {
        return view('registrasi.registrasi-anggota', ['name' => $name, 'nama_koperasi' => $koperasi[0]->nama_koperasi, 'id_koperasi' => $koperasi[0]->id]);
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
    } elseif ($koperasi[0]->id_tingkatan_koperasi > 2) {
        return view('error');
    } elseif ($koperasi[0]->id_tingkatan_koperasi < 3) {
        $tingkatan = $koperasi[0]->id_tingkatan_koperasi + 1;
        $tingkat_atas = DB::table('tbl_tingkat_koperasi')->where('id', $tingkatan)->get();
        $tingkat_bawah = DB::table('tbl_tingkat_koperasi')->where('id', $koperasi[0]->id_tingkatan_koperasi)->get();

        // return dd($tingkat_atas);
        return view('registrasi.registrasi-koperasi', ['tingkat_bawah' => $tingkat_atas[0]->nama_tingkatan, "tingkat_atas"=>$tingkat_bawah[0]->nama_tingkatan, 'id_koperasi' => $koperasi[0]->id, 'nama_koperasi' => $koperasi[0]->nama_koperasi, 'id_tingkat' => $tingkatan]);
    }
})->name('koperasi');

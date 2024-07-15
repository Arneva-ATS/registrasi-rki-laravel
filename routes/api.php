<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WilayahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('register')->group(function () {
    Route::post('/rki/primkop', function () {
        return "OK";
    });
    Route::post("/rki/insert-koperasi/{tingkat}", [KoperasiController::class, 'insert_koperasi_rki']);
    Route::post('/anggota/insert-anggota', [AnggotaController::class, 'insert_anggota']);
    Route::post('/koperasi/insert-koperasi/{koperasi}/{tingkat}', [KoperasiController::class, 'insert_koperasi']);
})->name('register');

Route::prefix('wilayah')->group(function () {
    Route::get('/provinsi', [WilayahController::class, 'province']);
    Route::get('/kota/{id_provinsi}', [WilayahController::class, 'city']);
    Route::get('/kecamatan/{id_kota}', [WilayahController::class, 'district']);
    Route::get('/kelurahan/{id_kecamatan}', [WilayahController::class, 'subdistrict']);
})->name('wilayah');
Route::post('/approve/send-mail/anggota/{id}', [MailController::class, 'sendMailApproveAnggota']);
Route::post('/approve/send-mail/koperasi/{id}', [MailController::class, 'sendMailApproveKoperasi']);
Route::delete('/reject/send-mail/anggota/{id}', [MailController::class, 'sendMailRejectAnggota']);
Route::delete('/reject/send-mail/koperasi/{id}', [MailController::class, 'sendMailRejectKoperasi']);
Route::prefix('products')->group(function () {
    Route::get('/get-products/{id}', [ProductController::class, 'get_product']);
    Route::get('/detail-products/{id_koperasi}/{id_produk}', [ProductController::class, 'detail_product']);
    Route::post('/insert-product/{id}', [ProductController::class, 'insert']);
    Route::post('/insert-kategori/{id}', [ProductCategoryController::class, 'store']);
    Route::delete('/delete-kategori/{id}', [ProductCategoryController::class, 'destroy']);
    Route::delete('/delete-produk/{id}', [ProductController::class, 'destroy']);
    Route::patch('/update-produk/{id}', [ProductController::class, 'update']);
})->name('products');

// ============ Pengajuan Registrasi ================
Route::post('/approve/send-mail/pengajuan/{id}', [MailController::class, 'sendMailApprovePengajuan']);
Route::delete('/reject/send-mail/pengajuan/{id}', [MailController::class, 'sendMailRejectPengajuan']);
// ============ End Pengajuan Registrasi ================


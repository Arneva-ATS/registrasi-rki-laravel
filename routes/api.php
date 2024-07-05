<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoperasiController;
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

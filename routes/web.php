<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Halaman_dashboardController;
use App\Http\Controllers\Halaman_manajemen_jenis_suratController;
use App\Http\Controllers\Halaman_manajemen_userController;
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

Route::get('/',[AuthController::class,'index']);
Route::post('login',[AuthController::class,'login']);
Route::get('logout', [AuthController::class, 'logout']);


Route::group(['middleware' => ['akses']], function () {
    Route::get('dashboard',[Halaman_dashboardController::class,'index']);
    Route::get('tambah-surat',[Halaman_dashboardController::class,'create']);
    Route::post('simpan-surat',[Halaman_dashboardController::class,'store']);
    Route::get('akun',[Halaman_manajemen_userController::class,'index']);
    Route::get('tambah-user',[Halaman_manajemen_userController::class,'create']);
    Route::post('simpan-user',[Halaman_manajemen_userController::class,'store']);
    Route::post('hapus-user/{id}',[Halaman_manajemen_userController::class,'destroy']);
    Route::get('jenis-surat',[Halaman_manajemen_jenis_suratController::class,'index']);
    Route::get('tambah-jenis-surat',[Halaman_manajemen_jenis_suratController::class,'create']);
    Route::post('simpan-jenis-surat',[Halaman_manajemen_jenis_suratController::class,'store']);

});


Route::get('/clear-cache', function () {



    $exitCode = Artisan::call('cache:clear');



    $exitCode = Artisan::call('config:cache');



    \Artisan::call('route:clear');



    return 'DONE'; //Return anything



});
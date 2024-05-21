<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\LevelControler;
use App\Http\Controllers\Api\LoginControler;
use App\Http\Controllers\Api\LogoutControler;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\UserController;
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

Route::post('/register', RegisterController::class)->name('register');
Route::post('/register1', App\Http\Controllers\Api\RegisterController::class)->name('register1');
Route::post('/login' , LoginControler::class)->name('login');
Route::post('/logout' , LogoutControler::class)->name('logout');
Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});

Route::get('levels', [LevelControler::class, 'index']);
Route::post('levels', [LevelControler::class, 'store']);
Route::get('levels/{level}', [LevelControler::class, 'show']);
Route::put('levels/{level}', [LevelControler::class, 'update']);
Route::delete('levels/{level}', [LevelControler::class, 'destroy']);

Route::get('user', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/{user}', [UserController::class, 'show']);
Route::put('user/{user}', [UserController::class, 'update']);
Route::delete('user/{user}', [UserController::class, 'destroy']);

Route::get('barang', [BarangController::class, 'index']);
Route::post('barang', [BarangController::class, 'store']);
Route::get('barang/{barang}', [BarangController::class, 'show']);
Route::put('barang/{barang}', [BarangController::class, 'update']);
Route::delete('barang/{barang}', [BarangController::class, 'destroy']);

Route::get('kategori', [KategoriController::class, 'index']);
Route::post('kategori', [KategoriController::class, 'store']);
Route::get('kategori/{kategori}', [KategoriController::class, 'show']);
Route::put('kategori/{kategori}', [KategoriController::class, 'update']);
Route::delete('kategori/{kategori}', [KategoriController::class, 'destroy']);

// TRANSAKSI
Route::get('transaksi', [TransaksiController::class, 'index']);
Route::post('transaksi', [TransaksiController::class, 'store']);
Route::get('transaksi/{transaksi}', [TransaksiController::class, 'show']);
Route::put('transaksi/{transaksi}', [TransaksiController::class, 'update']);
Route::delete('transaksi/{transaksi}', [TransaksiController::class, 'destroy']);
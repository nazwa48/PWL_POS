<?php

use App\Http\Controllers\JS7\barangController;
use App\Http\Controllers\JS7\kategoriController as JS7KategoriController;
use App\Http\Controllers\JS7\levelController as JS7LevelController;
use App\Http\Controllers\JS7\stokController;
use App\Http\Controllers\JS7\transactionController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\KategoriModel;
use App\Http\Controllers\UsersController;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'users'], function () {
    Route::get('/' , [UsersController::class , 'index']);
    Route::get('/list' , [UsersController::class , 'list']);
    Route::get('/create', [UsersController::class , 'create']);
    Route::post('/store' , [UsersController::class , 'store']);
    Route::get('/show/{id}', [UsersController::class , 'show']);
    Route::get('/{id}/edit', [UsersController::class ,'edit']);
    Route::put('/{id}', [UsersController::class ,'update']);
    Route::delete('/{id}', [UsersController::class ,'destroy']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/' , [JS7KategoriController::class , 'index']);
    Route::get('/list' , [JS7KategoriController::class , 'list']);
    Route::get('/create', [JS7KategoriController::class , 'create']);
    Route::post('/store' , [JS7KategoriController::class , 'store']);
    Route::get('/show/{id}', [JS7KategoriController::class , 'show']);
    Route::get('/{id}/edit', [JS7KategoriController::class ,'edit']);
    Route::put('/{id}', [JS7KategoriController::class ,'update']);
    Route::delete('/{id}', [JS7KategoriController::class ,'destroy']);
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/' , [JS7LevelController::class , 'index']);
    Route::get('/list' , [JS7LevelController::class , 'list']);
    Route::get('/create', [JS7LevelController::class , 'create']);
    Route::post('/store' , [JS7LevelController::class , 'store']);
    Route::get('/show/{id}', [JS7LevelController::class , 'show']);
    Route::get('/{id}/edit', [JS7LevelController::class ,'edit']);
    Route::put('/{id}', [JS7LevelController::class ,'update']);
    Route::delete('/{id}', [JS7LevelController::class ,'destroy']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/' , [barangController::class , 'index']);
    Route::get('/list' , [barangController::class , 'list']);
    Route::get('/create', [barangController::class , 'create']);
    Route::post('/store' , [barangController::class , 'store']);
    Route::get('/show/{id}', [barangController::class , 'show']);
    Route::get('/{id}/edit', [barangController::class ,'edit']);
    Route::put('/{id}', [barangController::class ,'update']);
    Route::delete('/{id}', [barangController::class ,'destroy']);
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/' , [stokController::class , 'index']);
    Route::get('/list' , [stokController::class , 'list']);
    Route::get('/create', [stokController::class , 'create']);
    Route::post('/store' , [stokController::class , 'store']);
    Route::get('/show/{id}', [stokController::class , 'show']);
    Route::get('/{id}/edit', [stokController::class ,'edit']);
    Route::put('/{id}', [stokController::class ,'update']);
    Route::delete('/{id}', [stokController::class ,'destroy']);
});

Route::group(['prefix' => 'transaksi'], function () {
    Route::get('/' , [transactionController::class , 'index']);
    Route::get('/list' , [transactionController::class , 'list']);
    Route::get('/create', [transactionController::class , 'create']);
    Route::post('/store' , [transactionController::class , 'store']);
    Route::get('/show/{id}', [transactionController::class , 'show']);
    Route::get('/{id}/edit', [transactionController::class ,'edit']);
    Route::put('/{id}', [transactionController::class ,'update']);
    Route::delete('/{id}', [transactionController::class ,'destroy']);
});
// Route::get('/level', [LevelController::class, 'index']);
// Route::post('/level/store', [LevelController::class, 'store'])->name('level.store');

// Route::get('/kategori', [KategoriController::class, 'index']);


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/ubah/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route::get('/kategori', [KategoriController::class, 'index']);

// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori', [KategoriController::class, 'store']);

// Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');

// Route::get('/kategori/update/{id}', [KategoriController::class, 'update'])->name('/kategori/update');
// Route::put('/kategori/save_update/{id}', [KategoriController::class, 'save_update'])->name('/kategori/save_update');

// Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('/kategori/delete');

//-- JOBSHEET 6 --// 
// Manage user 

// Route::resource('user',POSController::class);

// Route::post('data_user', [POSController::class, 'storeDashboard'])->name('user.storeDashboard');

// Activate When Needed
// Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::get('/user/tambah', [UserController::class], 'tambah')->name('/user/tambah');
// Route::get('/user/tambah_simpan', [UserController::class], 'tambah_simpan')->name('/user/tambah_simpan');
// Route::get('/user/edit/{id}', [UserController::class, 'ubah'])->name('/user/ubah');
// Route::get('/user/{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');

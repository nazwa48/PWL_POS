<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}',[UserController::class,'ubah']);
Route::put('/user/ubah_simpan/{id}',[UserController::class,'ubah_simpan']);
Route::get('/user/hapus/{id}',[UserController::class,'hapus']);
Route::get('/kategori',[KategoriController::class,'index']);

Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class,'store']);

Route::get('/kategori/create', [KategoriController::class, 'create'])->name('createkategori');

Route::get('/kategori/update/{id}',[KategoriController::class,'update']);
Route::put('/kategori/update_save/{id}',[KategoriController::class,'update_save']);
Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy']);

//Manage User
Route::get('/user/create', [UserController::class, 'create'])->name('/user/create');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('/user/edit');
Route::get('/user', [UserController :: class, 'index'])->name('user.index');
Route::post('/user', [UserController :: class, 'store']);
Route::put('/user/{id}', [UserController :: class, 'edit_simpan'])->name('/user/edit_simpan');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('/user/delete');

//Manage Level
Route::get('/level', [LevelController::class, 'index'])->name('level.index');
Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');
Route::post('/level', [LevelController::class, 'store']);
Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('/level/edit');
Route::put('/level/{id}', [LevelController::class, 'edit_simpan'])->name('/level/edit_simpan');
Route::get('/level/delete/{id}', [LevelController::class, 'delete'])->name('/level/delete');

//m_user
Route::resource('m_user', POSController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ErorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RakBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PeminjamanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//auth
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/proses-register', [AuthController::class, 'prosesRegister']);
Route::get('/404', [ErorController::class, 'index']);

#ADMIN
    Route::get('/admin', [UserController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/list-admin', [UserController::class, 'listAdmin'])->middleware('userAkses:admin');
    Route::get('/create-admin', [UserController::class, 'createAdmin'])->middleware('userAkses:admin');
    Route::post('/store-admin', [UserController::class, 'storeAdmin'])->middleware('userAkses:admin');
    Route::get('/edit-admin/{id}', [UserController::class, 'editAdmin'])->middleware('userAkses:admin');
    Route::put('/update-admin/{id}', [UserController::class, 'updateAdmin'])->middleware('userAkses:admin');
    Route::delete('/delete-admin/{id}', [UserController::class, 'deleteAdmin'])->middleware('userAkses:admin');

    Route::get('/anggota', [UserController::class, 'anggota'])->middleware('userAkses:anggota');
    Route::get('/list-anggota', [UserController::class, 'listAnggota'])->middleware('userAkses:admin');
    Route::get('/create-anggota', [UserController::class, 'createAnggota'])->middleware('userAkses:admin');
    Route::post('/store-anggota', [UserController::class, 'storeAnggota'])->middleware('userAkses:admin');
    Route::get('/edit-anggota/{id}', [UserController::class, 'editAnggota'])->middleware('userAkses:admin');
    Route::put('/update-anggota/{id}', [UserController::class, 'updateAnggota'])->middleware('userAkses:admin');
    Route::delete('/delete-anggota/{id}', [UserController::class, 'deleteAnggota'])->middleware('userAkses:admin');

    Route::get('/logout', [AuthController::class, 'logout']);
    //penerbit
    Route::get('/penerbit', [PenerbitController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/tambahpenerbit', [PenerbitController::class, 'create'])->middleware('userAkses:admin');
    Route::post('/storepenerbit', [PenerbitController::class, 'store'])->middleware('userAkses:admin');
    Route::get('/editpenerbit/{update}', [PenerbitController::class, 'update'])->middleware('userAkses:admin');
    Route::put('/savepenerbit/{update}', [PenerbitController::class, 'save'])->middleware('userAkses:admin');
    Route::delete('/deletepenerbit/{delete}', [PenerbitController::class, 'delete'])->middleware('userAkses:admin');

    //kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/tambahkategori', [KategoriController::class, 'create'])->middleware('userAkses:admin');
    Route::post('/storekategori', [KategoriController::class, 'store'])->middleware('userAkses:admin');
    Route::get('/editkategori/{update}', [KategoriController::class, 'update'])->middleware('userAkses:admin');
    Route::put('/savekategori/{update}', [KategoriController::class, 'save'])->middleware('userAkses:admin');
    Route::delete('/deletekategori/{delete}', [KategoriController::class, 'delete'])->middleware('userAkses:admin');

    //buku
    Route::get('/buku', [BukuController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/tambahbuku', [BukuController::class, 'create'])->middleware('userAkses:admin');
    Route::post('/storeBuku', [BukuController::class, 'store'])->middleware('userAkses:admin');
    Route::get('/editBuku/{editBuku}', [BukuController::class, 'edit'])->middleware('userAkses:admin');
    Route::put('/updateBuku/{updateBuku}', [BukuController::class, 'update'])->middleware('userAkses:admin');
    Route::delete('/deleteBuku/{deleteBuku}', [BukuController::class, 'delete'])->middleware('userAkses:admin');

    //rak_buku
    Route::get('/rak_buku', [RakBukuController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/rak_buku/add', [RakBukuController::class, 'create'])->middleware('userAkses:admin');
    Route::post('/rak_buku/store', [RakBukuController::class, 'store'])->middleware('userAkses:admin');
    Route::get('/rak_buku/edit/{id}', [RakBukuController::class, 'edit'])->middleware('userAkses:admin');
    Route::put('/rak_buku/update/{id}', [RakBukuController::class, 'update'])->middleware('userAkses:admin');
    Route::delete('/rak_buku/delete/{delete}', [RakBukuController::class, 'delete'])->middleware('userAkses:admin');

    //peminjaman
    Route::get('admin/peminjaman', [PeminjamanController::class, 'index'])->middleware('userAkses:admin');
    Route::put('peminjaman/update-status/{id}', [PeminjamanController::class, 'updateStatus'])->middleware('userAkses:admin')->name('peminjaman.updateStatus');
    Route::get('riwayat/peminjaman', [PeminjamanController::class, 'riwayat'])->middleware('userAkses:anggota');

#ANGGOTA
    Route::get('/rak', [RakBukuController::class, 'rak'])->middleware('userAkses:anggota');
    Route::get('list_buku/{id}', [RakBukuController::class, 'listBook'])->middleware('userAkses:anggota');
    Route::get('peminjaman/{id}', [PeminjamanController::class, 'formPeminjaman'])->middleware('userAkses:anggota');
    Route::post('peminjaman/register', [PeminjamanController::class, 'register'])->middleware('userAkses:anggota');
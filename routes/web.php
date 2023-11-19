<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/regis', [UserController::class, 'registration']);
Route::get('/regis', function () {
    return view('regis');
});

Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth');

Route::resource('/dashboard/buku', BukuController::class)->middleware('auth');

Route::get('/dashboard/pinjam', [PeminjamanController::class, 'indexPeminjam'])->middleware('auth');
Route::post('/pinjam/{buku:id}', [PeminjamanController::class, 'pinjam']);

Route::get('/dashboard/bukupinjam', [PeminjamanController::class, 'indexAdmin'])->middleware('auth');
Route::put('/status_pinjam/{peminjaman:id}', [PeminjamanController::class, 'statusPinjam']);


Route::get('/dashboard/pinjaman_saya', [PeminjamanController::class, 'meminjamPeminjam'])->middleware('auth');


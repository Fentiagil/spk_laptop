<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerbandinganKriteriaController;
use App\Http\Controllers\PerbandinganAlternatifController;
use App\Http\Controllers\LoginController;


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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dataLaptop', [AlternatifController::class, 'indexDataLaptop'])->name('indexDataLaptop');

Route::get('/rekomendasiLaptop', [PerbandinganKriteriaController::class, 'indexRekomendasi'])->name('rekomendasiLaptop');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/homeAdmin', function () {
    return view('admin/homeAdmin');
})->name('homeAdmin');

Route::get('/kriteria', [KriteriaController::class, 'index'])->name('indexKriteria');
Route::get('/editKriteria/{id}', [KriteriaController::class, 'edit'])->name('editKriteria');
Route::put('/updateKriteria/{id}', [KriteriaController::class, 'update'])->name('updateKriteria');
Route::get('/tambahKriteria', [KriteriaController::class, 'create'])->name('createKriteria');
Route::post('/storeKriteria', [KriteriaController::class, 'store'])->name('storeKriteria');
Route::delete('/deleteKriteria/{id}', [KriteriaController::class, 'destroy'])->name('deleteKriteria');

Route::get('/alternatif', [AlternatifController::class, 'index'])->name('indexAlternatif');
Route::get('/editAlternatif/{id}', [AlternatifController::class, 'edit'])->name('editAlternatif');
Route::put('/updateAlternatif/{id}', [AlternatifController::class, 'update'])->name('updateAlternatif');
Route::get('/tambahAlternatif', [AlternatifController::class, 'create'])->name('createAlternatif');
Route::post('/storeAlternatif', [AlternatifController::class, 'store'])->name('storeAlternatif');
Route::delete('/deleteAlternatif/{id}', [AlternatifController::class, 'destroy'])->name('deleteAlternatif');

Route::get('/perbandinganKriteria', [PerbandinganKriteriaController::class, 'index']);
Route::post('/prosesKriteria', [PerbandinganKriteriaController::class, 'prosesKriteria'])->name('prosesKriteria');

Route::get('/perbandinganAlternatif/{jenis}', [PerbandinganKriteriaController::class, 'indexA'])->name('perbandinganAlternatif');
Route::post('/prosesAlternatif', [PerbandinganKriteriaController::class, 'prosesAlternatif'])->name('prosesAlternatif');

Route::get('/ranking', [PerbandinganKriteriaController::class, 'indexR'])->name('ranking');
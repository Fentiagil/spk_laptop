<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerbandinganKriteriaController;


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

Route::get('/login', function () {
    return view('login');
});

Route::get('/dataLaptop', function () {
    return view('dataLaptop');
});

Route::get('/rekomendasiLaptop', function () {
    return view('rekomendasiLaptop');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/homeAdmin', function () {
    return view('admin/homeAdmin');
});

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
Route::post('/proses-perbandingan', [YourController::class, 'prosesPerbandingan'])->name('proses-perbandingan');

Route::get('/perbandinganAlternatif', function () {
    return view('admin/perbandinganAlternatif');
});

Route::get('/ranking', function () {
    return view('admin/ranking');
});
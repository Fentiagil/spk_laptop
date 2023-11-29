<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/kriteria', function () {
    return view('admin/kriteria');
});

Route::get('/alternatif', function () {
    return view('admin/alternatif');
});

Route::get('/perbandinganKriteria', function () {
    return view('admin/perbandinganKriteria');
});

Route::get('/perbandinganAlternatif', function () {
    return view('admin/perbandinganAlternatif');
});

Route::get('/ranking', function () {
    return view('admin/ranking');
});
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Hallo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya : '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'Nim saya : '.$param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/matakuliah/{param1}', [MatakuliahController::class, 'show']);
Route::get('/matakuliah/show/{param1}', [MatakuliahController::class, 'show']);

Route::get('/home', [HomeController::class, 'index']) ->name('home');
Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);

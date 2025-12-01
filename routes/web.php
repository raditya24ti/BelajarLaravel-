<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MultipleuploadsController;

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';

});

Route::get('/mahasiswa', function () {
    return 'Hallo Mahasiswa';

});

Route::get('/nama/{Zahwa}', function ($Zahwa) {
    return 'Nama Saya: ' . $Zahwa;

});

Route::get('/nim/{Zahwa}', function ($Zahwa = '') {
    return 'Nim Saya: ' . $Zahwa;

});
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');

});
Route::get('/matakuliahindex', [MatakuliahController::class, 'index']);
Route::get('/matakuliahcreate', [MatakuliahController::class, 'create']);
Route::get('/matakuliahstore', [MatakuliahController::class, 'store']);
Route::get('/matakuliahshow', [MatakuliahController::class, 'show']);
Route::get('/matakuliahedit', [MatakuliahController::class, 'edit']);
Route::get('/matakuliahupdate', [MatakuliahController::class, 'update']);
Route::get('/matakuliahdestroy', [MatakuliahController::class, 'destroy']);

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('/home', function () {
    return view('home');

});
// Route::get('/auth', function () {
//     return view('home');

// });
// Route::get('/auth', [AuthController::class, 'index']);
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::post('/auth/login', [AuthController::class,'login'])->name('auth.login');

// Route::get('/auth', [AuthController::class, 'index']);
// Route::post('/auth/login', [AuthController::class, 'login']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('pelanggan', PelangganController::class);

// Route::get('/admin', function () {
//     return view('admin.template');
// });

Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

Route::resource('user', UserController::class);
// Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
// Route::post('/user/create', [UserController::class, 'create'])->name('user.create');
// Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Update profile (upload foto)
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Delete foto
Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Display profile
// Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');


Route::get('/profile', [ProfileController::class, 'index']);


// Edit profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');


Route::get('/multipleuploads', [MultipleuploadsController::class, 'index'])->name('uploads');
Route::post('/save', [MultipleuploadsController::class, 'store'])->name('uploads.store');
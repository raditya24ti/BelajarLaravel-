<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
    });

Route::get('/ada', function () {
    return 'Selamat Datang di Website Kampus PCR!';

});

Route::get('/mahasiswa', function () {
    return 'Hallo Mahasiswa';

});

Route::get('/nama/{Radit}', function ($Radit) {
    return 'Nama Saya: ' . $Radit;

});

Route::get('/nim/{Radit}', function ($Radit = '') {
    return 'Nim Saya: ' . $Radit;

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
Route::get('/auth', function () {
    return view('home');

});
Route::get('/auth', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);
// Route::get('/dashboard', function () {
//    return view('dashboard');
// });
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');


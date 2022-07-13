<?php

use App\Http\Controllers\GedungController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('kelas', 'KelasController');
    Route::resource('gedung', 'GedungController');
    Route::resource('spp', 'SppController');
    Route::resource('siswa', 'SiswaController');
    Route::resource('petugas', 'PetugasController');
    Route::resource('pembayaran', 'PembayaranController');
    Route::get('/history', 'PembayaranController@history');
    Route::get('/laporan', function () {
        return view('laporan');
    });
    route::get('/laporan/kelas', 'LaporanController@kelas');
    route::get('/laporan/gedung', 'LaporanController@gedung');
    route::get('/laporan/spp', 'LaporanController@spp');
    route::get('/laporan/siswa', 'LaporanController@siswa');
    route::get('/laporan/petugas', 'LaporanController@petugas');
    route::get('/laporan/pembayaran', 'LaporanController@pembayaran');
});

Route::get('gedung-import', [GedungController::class, 'export'])->name('gedung.export');
Route::get('kelas-import', [KelasController::class, 'export'])->name('kelas.export');
Route::get('pembayaran-import', [PembayaranController::class, 'export'])->name('pembayaran.export');
Route::get('siswa-import', [SiswaController::class, 'export'])->name('siswa.export');
Route::get('spp-import', [SppController::class, 'export'])->name('spp.export');

<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.dashboard');
});

Route::get('surat-baru', function () {
    return view('pages.surat.surat-baru.suratbaru');
});
Route::get('non-template', function () {
    return view('pages.surat.surat-baru.nontemplate');
});



Route::get('surat-masuk', function () {
    return view('pages.surat.suratmasuk');
});
Route::get('surat-keluar', function () {
    return view('pages.surat.suratkeluar');
});

Route::get('template-surat', function () {
    return view('pages.template.index');
});

Route::get('managemen-anggota', function () {
    return view('pages.managemen.index');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

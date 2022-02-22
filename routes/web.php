<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::post('post-login', [AuthController::class, 'postLogin']);

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('pages.dashboard');
    });

    Route::get('surat-baru', function () {
        return view('pages.surat.surat-baru.suratbaru');
    });

    Route::get('surat-baru/non-template', function () {
        return view('pages.surat.surat-baru.nontemplate');
    });

    Route::get('surat-masuk', function () {
        return view('pages.surat.surat-masuk.suratmasuk');
    });
    Route::get('surat-masuk/tambah-surat', function () {
        return view('pages.surat.surat-masuk.tambah');
    });

    Route::get('surat-keluar', function () {
        return view('pages.surat.surat-keluar.suratkeluar');
    });
    Route::get('surat-keluar/tambah-surat', function () {
        return view('pages.surat.surat-keluar.tambah');
    });

    Route::get('profile', function () {
        return view('pages.profile.index');
    });

    Route::prefix('template-surat')->group(function () {
        Route::get('daftar-template', function () {
            return view('pages.template.daftar');
        });

    });

    Route::middleware('admin')->group(function() {
        Route::get('manajemen-anggota', [UserController::class, 'index']);
        Route::get('manajemen-anggota/tambah-anggota', [UserController::class, 'tambah']);
        Route::get('edit-anggota', function () {
            return view('pages.manajemen.edit');
        });
    });
});

Route::get('error-404', function () {
    return view('error.404');
});
Route::get('error-500', function () {
    return view('error.500');
});

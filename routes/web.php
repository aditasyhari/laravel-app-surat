<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\ArsipSuratMasukController;
use App\Http\Controllers\ArsipSuratKeluarController;

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

    // surat baru
    Route::get('surat-baru', function () {
        return view('pages.surat.surat-baru.suratbaru');
    });

    Route::get('surat-baru/non-template', function () {
        return view('pages.surat.surat-baru.nontemplate');
    });
    Route::get('surat-baru/surat-template', function () {
        return view('pages.surat.surat-baru.template');
    });
    Route::get('surat-baru/surat-template/buat-surat', function () {
        return view('pages.surat.surat-baru.buatsurat');
    });
    // end surat baru

    // surat masuk
    Route::get('surat-masuk', [SuratController::class, 'suratMasuk']);
    Route::get('surat-masuk/detail-surat/{id}', [SuratController::class, 'detailSm']);

    // surat keluar
    Route::get('surat-keluar', [SuratController::class, 'suratKeluar']);
    Route::get('surat-keluar/detail-surat/{id}', [SuratController::class, 'detailSk']);
    Route::get('surat-keluar/edit-surat/{id}', [SuratController::class, 'editSk']);
    Route::put('surat-keluar/edit-surat/{id}', [SuratController::class, 'updateSk']);
    Route::delete('surat-keluar/delete-surat/{id}', [SuratController::class, 'deleteSk']);

    Route::get('profile', function () {
        return view('pages.profile.index');
    });

    Route::put('profile/update/{id}', [UserController::class, 'profileUpdate']);

    Route::prefix('template-surat')->group(function () {
        Route::get('daftar-template', function () {
            return view('pages.template.daftar');
        });
         Route::get('approv-template', function () {
            return view('pages.template.approv');
        });

    });

    Route::middleware('admin')->group(function() {
        // manajemen anggota
        Route::get('manajemen-anggota', [UserController::class, 'index']);
        Route::get('manajemen-anggota/tambah-anggota', [UserController::class, 'tambah']);
        Route::get('manajemen-anggota/edit-anggota/{id}', [UserController::class, 'edit']);
        Route::post('manajemen-anggota/tambah-anggota', [UserController::class, 'tambahData']);
        Route::put('manajemen-anggota/edit-anggota/{id}', [UserController::class, 'update']);
        Route::delete('manajemen-anggota/delete-anggota/{id}', [UserController::class, 'delete']);

        // klasifikasi
        Route::get('klasifikasi', [KlasifikasiController::class, 'index']);
        Route::get('klasifikasi/tambah-klasifikasi', [KlasifikasiController::class, 'tambah']);
        Route::get('klasifikasi/edit-klasifikasi/{id}', [KlasifikasiController::class, 'edit']);
        Route::post('klasifikasi/tambah-klasifikasi', [KlasifikasiController::class, 'tambahData']);
        Route::put('klasifikasi/edit-klasifikasi/{id}', [KlasifikasiController::class, 'update']);
        Route::delete('klasifikasi/delete-klasifikasi/{id}', [KlasifikasiController::class, 'delete']);

        
        Route::prefix('arsip-surat')->group(function () {
            // arsip sm
            Route::get('sm', [ArsipSuratMasukController::class, 'index']);
            Route::get('sm/tambah-arsip', [ArsipSuratMasukController::class, 'tambah']);
            Route::get('sm/detail-arsip/{id}', [ArsipSuratMasukController::class, 'detail']);
            Route::post('sm/tambah-arsip', [ArsipSuratMasukController::class, 'tambahData']);
            Route::delete('sm/delete-arsip/{id}', [ArsipSuratMasukController::class, 'delete']);
    
            // arsip sk
            Route::get('sk', [ArsipSuratKeluarController::class, 'index']);
            Route::get('sk/tambah-arsip', [ArsipSuratKeluarController::class, 'tambah']);
            Route::get('sk/detail-arsip/{id}', [ArsipSuratKeluarController::class, 'detail']);
            Route::post('sk/tambah-arsip', [ArsipSuratKeluarController::class, 'tambahData']);
            Route::delete('sk/delete-arsip/{id}', [ArsipSuratKeluarController::class, 'delete']);
        });
    });
});

Route::get('error-404', function () {
    return view('error.404');
});
Route::get('error-500', function () {
    return view('error.500');
});

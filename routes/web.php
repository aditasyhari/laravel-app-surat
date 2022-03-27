<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\TemplateSuratController;
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
    Route::get('/', [UserController::class, 'dashboard']);

    // surat baru
    Route::get('surat-baru', function () {
        return view('pages.surat.surat-baru.suratbaru');
    });

    Route::get('surat-baru/non-template', [SuratController::class, 'pengajuanNomor']);
    Route::post('surat-baru/non-template', [SuratController::class, 'pengajuanNomor']);
    Route::get('surat-baru/non-template/buat', [SuratController::class, 'suratNonTemplate'])->name('surat-nontemplate');
    Route::post('surat-baru/non-template/buat', [SuratController::class, 'buatSurat']);
    
    Route::get('surat-baru/surat-template', [SuratController::class, 'listTemplate']);
    Route::get('surat-baru/surat-template/buat', [SuratController::class, 'suratTemplate'])->name('surat-template');
    Route::post('surat-baru/surat-template/buat', [SuratController::class, 'buatSurat']);
    Route::get('surat-baru/surat-template/{id}/pengajuan-nomor', [SuratController::class, 'pengajuanNomorTemplate']);
    Route::post('surat-baru/surat-template/{id}/pengajuan-nomor', [SuratController::class, 'pengajuanNomorTemplate']);
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

    // generate pdf
    Route::post('template-surat/preview', [PdfController::class, 'previewTemplate']);
    Route::post('surat-keluar/preview', [PdfController::class, 'preview']);
    Route::put('surat-keluar/preview', [PdfController::class, 'preview']);
    Route::post('surat-keluar/lihat-surat-pdf', [PdfController::class, 'lihatPdf']);
    Route::post('surat-keluar/lihat-surat-pdf-draft', [PdfController::class, 'lihatPdfDraft']);

    // validator
    Route::get('validasi-sk', [SuratController::class, 'validasiSk']);
    Route::get('validasi-sk/detail-surat/{id}', [SuratController::class, 'detailValidasiSk']);
    Route::post('validasi-sk/detail-surat/validasi', [SuratController::class, 'submitValidasiSk']);
    
    // ttd
    Route::get('persetujuan-ttd', [SuratController::class, 'persetujuanTtd']);
    Route::get('persetujuan-ttd/detail-surat/{id}', [SuratController::class, 'detailValidasiSk']);
    Route::post('persetujuan-ttd/detail-surat/ttd', [SuratController::class, 'submitTtdSk']);

    Route::get('profile', function () {
        return view('pages.profile.index');
    });

    Route::put('profile/update/{id}', [UserController::class, 'profileUpdate']);

    Route::prefix('template-surat')->group(function () {
        Route::get('daftar-template', [TemplateSuratController::class, 'daftarTemplate'])->name('daftar-template');

        Route::get('template-approval', [TemplateSuratController::class, 'approvalTemplate']);
        Route::post('template-approval/detail', [TemplateSuratController::class, 'detailApprovalTemplate']);
        Route::post('template-approval/detail/approval', [TemplateSuratController::class, 'approval']);
        Route::post('template-approval/preview', [PdfController::class, 'previewApproval']);
        Route::get('edit-template/{id}', [TemplateSuratController::class, 'editTemplate']);
        Route::put('edit-template/{id}', [TemplateSuratController::class, 'editTemplate']);
        Route::delete('delete/{id}', [TemplateSuratController::class, 'deleteTemplate']);
        Route::get('tambah-template', [TemplateSuratController::class, 'tambahTemplate']);
        Route::post('tambah-template', [TemplateSuratController::class, 'tambahTemplate']);
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

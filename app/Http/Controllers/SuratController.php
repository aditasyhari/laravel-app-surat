<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\ArsipSuratMasuk;
use Auth;

class SuratController extends Controller
{
    //
    public function suratMasuk()
    {
        if(Auth::user()->role == 'admin') {
            $sm = ArsipSuratMasuk::orderBy('read', 'asc')->orderBy('created_at', 'desc')->get();
        } else {
            $sm = ArsipSuratMasuk::where('id_user', Auth::user()->id_user)->orderBy('read', 'asc')->orderBy('created_at', 'desc')->get();
        }

        return view('pages.surat.surat-masuk.suratmasuk', compact('sm'));
    }

    public function suratKeluar()
    {
        if(Auth::user()->role == 'admin') {
            $sk = SuratKeluar::orderBy('updated_at', 'desc')->get();
        } else {
            $sk = SuratKeluar::where('id_user', Auth::user()->id_user)->orderBy('updated_at', 'desc')->get();
        }

        return view('pages.surat.surat-keluar.suratkeluar', compact('sk'));
    }

    public function detailSm($id)
    {
        try {
            $sm = ArsipSuratMasuk::find($id);
            return view('pages.surat.surat-masuk.detail', compact('sm'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

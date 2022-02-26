<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipSuratMasuk;
use Auth;

class SuratController extends Controller
{
    //
    public function suratMasuk()
    {
        $sm = ArsipSuratMasuk::where('id_user', Auth::user()->id_user)->orderBy('read', 'desc')->get();

        return view('pages.surat.surat-masuk.suratmasuk', compact('sm'));
    }
}

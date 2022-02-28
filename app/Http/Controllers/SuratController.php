<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKeluar;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Models\ArsipSuratMasuk;
use Carbon\Carbon;
use Auth;
use Str;

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

    public function pengajuanNomor(Request $request)
    {
        try {
            if($request->isMethod('get')) {
                $klasifikasi = Klasifikasi::orderBy('nama', 'asc')->get();
                $user = User::select('id_user', 'nama', 'ttd')->where('role', 'user')->get();
                return view('pages.surat.surat-baru.pengajuan-nomor', compact(['klasifikasi', 'user']));
            } else {    
                $klasifikasi = Klasifikasi::find($request->id_klasifikasi);
                $max = SuratKeluar::where('kode_klasifikasi', $klasifikasi->kode)->max('urutan');
                $kode = Str::upper($klasifikasi->kode);
                $bulan = Carbon::parse($request->tgl_surat_fisik)->format('m');
                $bulan_romawi = getBulanRomawi($bulan);
                $tahun = date("Y");

                if(is_numeric($max)) {
                    $max += 1;
                } else {
                    $max = 1;
                }

                $nomor_surat = "$max/$kode/$bulan_romawi/$tahun";

                $pengajuan = [
                    'nomor_surat' => $nomor_surat,
                    'tgl-surat_fisik' => $request->tgl_surat_fisik,
                    'id_klasifikasi' => $request->klasifikasi,
                    'id_validator' => $request->id_validator,
                    'id_ttd' => $request->id_ttd,
                ];

                return redirect()->route('surat-nontemplate', ['pengajuan' => $pengajuan]);
            }
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function suratNonTemplate(Request $request)
    {
        try {
            // return view('pages.surat.surat-baru.pengajuan-nomor');
            dd($request->pengajuan['nomor_surat']);
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

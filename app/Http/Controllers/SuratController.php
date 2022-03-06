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

                $param = [
                    'kode' => $klasifikasi->kode,
                    'tgl_surat_fisik' => $request->tgl_surat_fisik,
                ];

                $nomor = nomorSurat($param);
                $validator = User::select('nama')->find($request->id_validator);
                $ttd = User::select('nama')->find($request->id_ttd);

                $pengajuan = [
                    'nomor_surat' => $nomor['nomor_surat'],
                    'tgl_surat_fisik' => $request->tgl_surat_fisik,
                    'kode_klasifikasi' => $klasifikasi->kode,
                    'nama_klasifikasi' => $klasifikasi->nama,
                    'id_pembuat' => Auth::user()->id_user,
                    'id_validator' => $request->id_validator,
                    'id_ttd' => $request->id_ttd,
                    'nama_ttd' => $ttd->nama,
                    'nama_validator' => $ttd->nama,
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
            $pengajuan = $request->pengajuan;

            return view('pages.surat.surat-baru.buatsurat', compact('pengajuan'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function buatSuratNonTemplate(Request $request)
    {
        try {
            $req = $request->except(['pengajuan']);

            $param = [
                'kode' => $request->kode_klasifikasi,
                'tgl_surat_fisik' => $request->tgl_surat_fisik,
            ];
                
            $nomor = nomorSurat($param);
            $req['nomor_surat'] = $nomor['nomor_surat'];
            $req['urutan'] = $nomor['urutan'];

            $param['perihal'] = $request->perihal;
            $param['tujuan'] = $request->tujuan;
            $param['email_tujuan'] = $request->email_tujuan;
            $param['ukuran_ttd'] = $request->ukuran_ttd;
            $param['nomor_surat'] = $nomor['nomor_surat'];
            $param['konten'] = $request->layout_konten;

            $req['layout_konten'] = variabelReplace($param);

            SuratKeluar::create($req);

            return redirect('/surat-keluar')->with('status', 'Surat berhasil dibuat!');
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKeluar;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Models\ArsipSuratMasuk;
use App\Models\Template;
use App\Models\Disposisi;
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
            $disposisi = Disposisi::select('arsip_sm.*')
                        ->join('arsip_sm', 'arsip_sm.id_arsip_sm', '=', 'disposisi.id_arsip_sm')
                        ->where('id_user_tujuan', Auth::user()->id_user);
            $sm = ArsipSuratMasuk::where('id_user', Auth::user()->id_user)
                    ->union($disposisi)
                    ->orderBy('read', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->get();
        }

        // dd($disposisi->get());

        return view('pages.surat.surat-masuk.suratmasuk', compact('sm'));
    }

    public function suratKeluar()
    {
        if(Auth::user()->role == 'admin') {
            $sk = SuratKeluar::orderBy('updated_at', 'desc')->get();
        } else {
            $sk = SuratKeluar::where('id_pembuat', Auth::user()->id_user)->orderBy('updated_at', 'desc')->get();
        }

        return view('pages.surat.surat-keluar.suratkeluar', compact('sk'));
    }

    public function detailSm($id)
    {
        try {
            $sm = ArsipSuratMasuk::find($id);
            if(Auth::user()->role == 'user') {
                $user = User::where('role', '!=', 'admin')->where('id_user', '!=', Auth::user()->id_user)->get();
                $userDisposisi = Disposisi::join('user', 'user.id_user', '=', 'disposisi.id_user_tujuan')
                                ->where('id_arsip_sm', $id)
                                ->where('id_user_dari', Auth::user()->id_user);

                if($userDisposisi->count()) {
                    $dataTujuan = $userDisposisi->first();
                    $status = "Surat sudah disposisi ke $dataTujuan->nama";
                } else {
                    $status = "";
                }

                if($sm->id_user != Auth::user()->id_user) {
                    $disposisi = 1;
                } else {
                    $disposisi = 0;
                }

                return view('pages.surat.surat-masuk.detail', compact(['sm', 'user', 'status', 'disposisi']));
            }

            return view('pages.surat.surat-masuk.detail', compact('sm'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function disposisiSm(Request $request, $id)
    {
        try {
            $id_user_dari = Auth::user()->id_user;
            $id_user_tujuan = $request->id_user;

            $disposisi = Disposisi::where('id_arsip_sm', $id)->where('id_user_dari', $id_user_tujuan)->count();
            if($disposisi) {
                $user = User::find($id_user_tujuan);
                return back()->with('error', "Tidak dapat disposisi surat ke $user->nama");
            }

            Disposisi::create([
                'id_arsip_sm' => $id,
                'id_user_dari' => $id_user_dari,
                'id_user_tujuan' => $id_user_tujuan
            ]);

            return back();
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
                // $ttd = User::select('nama')->find($request->id_ttd);

                $pengajuan = [
                    'nomor_surat' => $nomor['nomor_surat'],
                    'tgl_surat_fisik' => $request->tgl_surat_fisik,
                    'kode_klasifikasi' => $klasifikasi->kode,
                    'nama_klasifikasi' => $klasifikasi->nama,
                    'id_pembuat' => Auth::user()->id_user,
                    'id_validator' => $request->id_validator,
                    // 'id_ttd' => $request->id_ttd,
                    // 'nama_ttd' => $ttd->nama,
                    'nama_validator' => $validator->nama,
                ];

                return redirect()->route('surat-nontemplate', ['pengajuan' => $pengajuan]);
            }
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function pengajuanNomorTemplate(Request $request, $id)
    {
        try {
            if($request->isMethod('get')) {
                $template = Template::from('template as t')->select('id_template', 'nama_template', 'k.nama as klasifikasi', 'k.kode as kode_klasifikasi')
                        ->leftJoin('klasifikasi as k', 'k.id_klasifikasi', '=', 't.id_klasifikasi')
                        ->where('id_template', $id)
                        ->first();
                
                $user = User::select('id_user', 'nama', 'ttd')->where('role', 'user')->get();

                return view('pages.surat.surat-baru.pengajuan-nomor-template', compact(['template', 'user']));
            } else {    
                $param = [
                    'kode' => $request->kode_klasifikasi,
                    'tgl_surat_fisik' => $request->tgl_surat_fisik,
                ];

                $nomor = nomorSurat($param);
                $validator = User::select('nama')->find($request->id_validator);
                // $ttd = User::select('nama')->find($request->id_ttd);

                $pengajuan = [
                    'nomor_surat' => $nomor['nomor_surat'],
                    'tgl_surat_fisik' => $request->tgl_surat_fisik,
                    'kode_klasifikasi' => $request->kode_klasifikasi,
                    'nama_klasifikasi' => $request->nama_klasifikasi,
                    'id_pembuat' => Auth::user()->id_user,
                    'id_validator' => $request->id_validator,
                    // 'id_ttd' => $request->id_ttd,
                    // 'nama_ttd' => $ttd->nama,
                    'nama_validator' => $validator->nama,
                ];

                return redirect()->route('surat-template', ['pengajuan' => $pengajuan, 'id_template' => $id]);
            }
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function suratTemplate(Request $request)
    {
        try {
            $template = Template::find($request->id_template);
            $pengajuan = $request->pengajuan;

            return view('pages.surat.surat-baru.buatsurat-template', compact(['pengajuan', 'template']));
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

    public function listTemplate()
    {
        try {
            $template = Template::from('template as t')->select('id_template', 'nama_template', 'k.nama as klasifikasi', 'k.kode as kode_klasifikasi')
                        ->leftJoin('klasifikasi as k', 'k.id_klasifikasi', '=', 't.id_klasifikasi')
                        ->where('status_template', 'disetujui')
                        ->orderBy('nama_template', 'asc')
                        ->get();

            return view('pages.surat.surat-baru.list-template', compact('template'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function buatSurat(Request $request)
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
            $param['tujuan'] = $request->tujuan_surat;
            $param['email_tujuan'] = $request->email_tujuan;
            $param['ukuran_ttd'] = $request->ukuran_ttd;
            $param['nomor_surat'] = $nomor['nomor_surat'];
            $param['konten'] = $request->layout_konten;

            $req['layout_konten_draft'] = $request->layout_konten;
            $req['layout_konten'] = variabelReplace($param);

            SuratKeluar::create($req);

            return redirect('/surat-keluar')->with('status', 'Surat berhasil dibuat!');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function validasiSk()
    {
        try {
            $sk = SuratKeluar::where('id_validator', Auth::user()->id_user)
                ->orderBy('read_validator', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();
    
            return view('pages.surat.validasi', compact('sk'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function persetujuanTtd()
    {
        try {
            $sk = SuratKeluar::where('id_ttd', Auth::user()->id_user)
                ->orderBy('created_at', 'desc')
                ->get();
    
            return view('pages.surat.persetujuan-ttd', compact('sk'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function detailSk($id)
    {
        try {
            $sk = SuratKeluar::with('validator')->find($id);

            return view('pages.surat.surat-keluar.detail', compact('sk'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function detailValidasiSk($id)
    {
        try {
            $sk = SuratKeluar::with('validator')->find($id);
            $sk->update(['read_validator' => 1]);

            return view('pages.surat.detail-validasi', compact('sk'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function submitValidasiSk(Request $request)
    {
        try {
            if($request->status_surat) {
                $sk = SuratKeluar::find($request->id_surat_keluar);
                $status_surat = $request->status_surat;
    
                $update = [
                    'status_surat' => $status_surat,
                    'revisi' => ""
                ];
    
                if($status_surat == 'revisi') {
                    $update['revisi'] = $request->revisi;
                }
    
                $sk->update($update);
            } else {
                return back()->with('error', 'Pilih jenis validasi surat terlebih dahulu !');
            }

            return redirect('validasi-sk')->with('status', 'Berhasil validasi surat.');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function submitTtdSk(Request $request)
    {
        try {
            $sk = SuratKeluar::find($request->id_surat_keluar);

            $param = [
                'ukuran_ttd' => $sk->ukuran_ttd,
                'konten' => $sk->layout_konten
            ];

            $update = [
                'status_ttd' => 'disetujui',
                'layout_konten' => replaceTtd($param)
            ];

            $sk->update($update);

            return redirect('persetujuan-ttd')->with('status', 'Berhasil validasi surat.');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function editSk($id)
    {
        try {
            $sk = SuratKeluar::with('validator')->find($id);

            return view('pages.surat.surat-keluar.edit', compact('sk'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function updateSk(Request $request, $id)
    {
        try {
            $req = $request->all();

            $param = [];
            $param['tgl_surat_fisik'] = $request->tgl_surat_fisik;
            $param['perihal'] = $request->perihal;
            $param['tujuan'] = $request->tujuan_surat;
            $param['email_tujuan'] = $request->email_tujuan;
            $param['ukuran_ttd'] = $request->ukuran_ttd;
            $param['nomor_surat'] = $request->nomor_surat;
            $param['konten'] = $request->layout_konten;

            $req['layout_konten_draft'] = $request->layout_konten;
            $req['layout_konten'] = variabelReplace($param);
            $req['status_surat'] = 'pending';
            $req['revisi'] = '';
            $req['read_validator'] = 0;

            SuratKeluar::find($id)->update($req);

            return redirect('/surat-keluar')->with('status', 'Surat berhasil diperbarui!');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function deleteSk($id)
    {
        try {
            SuratKeluar::destroy($id);
            
            return back()->with('status', 'Surat berhasil dihapus!');
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

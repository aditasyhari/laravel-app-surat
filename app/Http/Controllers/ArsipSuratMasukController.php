<?php

namespace App\Http\Controllers;

use App\Models\ArsipSuratMasuk;
use Illuminate\Http\Request;
use App\Models\Klasifikasi;
use App\Models\User;
use Exception;
use Str;
use File;

class ArsipSuratMasukController extends Controller
{
    //
    public function index()
    {
        try {
            $sm = ArsipSuratMasuk::orderBy('created_at', 'desc')->get();
            return view('pages.arsip.arsip-masuk.index', compact('sm'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function tambah()
    {
        try {
            $klasifikasi = Klasifikasi::orderBy('nama', 'asc')->get();
            $tujuan = User::where('role', '!=', 'admin')->get();
            return view('pages.arsip.arsip-masuk.tambah', compact(['klasifikasi', 'tujuan']));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function tambahData(Request $request)
    {
        try {
            $input = [
                'klasifikasi' => Str::lower($request->klasifikasi),
                'no_sm' => Str::lower($request->no_sm),
                'tgl_surat_diterima' => $request->tgl_surat_diterima,
                'tgl_surat_fisik' => $request->tgl_surat_fisik,
                'dari' => Str::lower($request->dari),
                'perihal' => Str::lower($request->perihal),
                'ket' => Str::lower($request->ket),
                'id_user' => $request->id_user
            ];

            $user = User::find($request->id_user);
            $input['tujuan_surat'] = $user->nama;

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $destinationPath = 'arsip/surat-masuk/';
                $namaFile = date('YmdHis')."_arsip_sm.".$file->getClientOriginalExtension();
                $file->move($destinationPath, $namaFile);
                $input['file'] = "$namaFile";
            }

            ArsipSuratMasuk::create($input);

            return back()->with('success', 'Data berhasil disimpan !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function detail($id)
    {
        try {
            $sm = ArsipSuratMasuk::find($id);
            return view('pages.arsip.arsip-masuk.detail', compact('sm'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function delete($id)
    {
        try {
            $arsip = ArsipSuratMasuk::find($id);
            if (File::exists(public_path("arsip/surat-masuk/" . $arsip->file))) {
                File::delete(public_path("arsip/surat-masuk/" . $arsip->file));
            }
            
            $arsip->destroy($id);

            return back()->with('success', 'Data berhasil dihapus !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

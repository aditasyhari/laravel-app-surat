<?php

namespace App\Http\Controllers;

use App\Models\ArsipSuratKeluar;
use Illuminate\Http\Request;
use App\Models\Klasifikasi;
use App\Models\User;
use Exception;
use File;
use Str;

class ArsipSuratKeluarController extends Controller
{
    //
    public function index()
    {
        try {
            $sk = ArsipSuratKeluar::orderBy('created_at', 'desc')->get();
            return view('pages.arsip.arsip-keluar.index', compact('sk'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function tambah()
    {
        try {
            $klasifikasi = Klasifikasi::orderBy('nama', 'asc')->get();
            return view('pages.arsip.arsip-keluar.tambah', compact(['klasifikasi']));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function tambahData(Request $request)
    {
        try {
            $input = [
                'klasifikasi' => Str::lower($request->klasifikasi),
                'no_sk' => Str::lower($request->no_sk),
                'tgl_surat_fisik' => $request->tgl_surat_fisik,
                'dari' => Str::lower($request->dari),
                'tujuan_surat' => Str::lower($request->tujuan_surat),
                'perihal' => Str::lower($request->perihal),
                'ket' => Str::lower($request->ket),
            ];

            $file = $request->file('file');
            $destinationPath = 'arsip/surat-keluar/';
            $namaFile = date('YmdHis')."_arsip_sk.".$file->getClientOriginalExtension();
            $file->move($destinationPath, $namaFile);
            $input['file'] = "$namaFile";

            ArsipSuratKeluar::create($input);

            return back()->with('success', 'Data berhasil disimpan !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function detail($id)
    {
        try {
            $sk = ArsipSuratKeluar::find($id);
            return view('pages.arsip.arsip-keluar.detail', compact('sk'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function delete($id)
    {
        try {
            $arsip = ArsipSuratKeluar::find($id);
            if (File::exists(public_path("arsip/surat-keluar/" . $arsip->file))) {
                File::delete(public_path("arsip/surat-keluar/" . $arsip->file));
            }
            
            $arsip->destroy($id);

            return back()->with('success', 'Data berhasil dihapus !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

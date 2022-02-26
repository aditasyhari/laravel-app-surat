<?php

namespace App\Http\Controllers;

use App\Models\ArsipSuratKeluar;
use Illuminate\Http\Request;
use Exception;
use Validator;
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
            return view('pages.arsip.arsip-keluar.tambah');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function tambahData(Request $request)
    {
        try {
            $input = [
                'nama' => Str::lower($request->nama),
                'kode' => Str::lower($request->kode),
            ];

            Klasifikasi::create($input);

            return back()->with('success', 'Data berhasil disimpan !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function edit($id)
    {
        try {
            $klasifikasi = Klasifikasi::find($id);
            return view('pages.klasifikasi.edit', compact('klasifikasi'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $klasifikasi = Klasifikasi::find($id);

            $update = [
                'kode' => Str::lower($request->kode),
                'nama' => Str::lower($request->nama),
            ];

            $klasifikasi->update($update);

            return back()->with('success', 'Data berhasil diperbarui !');
        } catch (Exception $e) {
            dd($e->getMessage());
            return view('error.500');
        }
    }

    public function delete($id)
    {
        try {
            $klasifikasi = Klasifikasi::find($id);
            $klasifikasi->destroy($id);

            return back()->with('success', 'Data berhasil dihapus !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

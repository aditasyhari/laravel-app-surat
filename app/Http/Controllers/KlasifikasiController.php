<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klasifikasi;
use Exception;
use Validator;
use Str;

class KlasifikasiController extends Controller
{
    //
    public function index()
    {
        $klasifikasi = Klasifikasi::orderBy('created_at', 'desc')->get();
        return view('pages.klasifikasi.index', compact('klasifikasi'));
    }

    public function tambah()
    {
        try {
            return view('pages.klasifikasi.tambah');
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

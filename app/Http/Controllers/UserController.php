<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Template;
use App\Models\SuratKeluar;
use App\Models\ArsipSuratKeluar;
use App\Models\ArsipSuratMasuk;
use App\Models\Disposisi;
use Exception;
use File;
use Auth;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        $total_anggota = User::where('role', '!=', 'admin')->count();
        if(Auth::user()->role == 'admin') {
            $total_sk = SuratKeluar::count();
            $total_sm = ArsipSuratMasuk::count();
        } else {
            $total_sk = SuratKeluar::where('id_pembuat', Auth::user()->id_user)->count();
            $disposisi = Disposisi::select('arsip_sm.*')
                        ->join('arsip_sm', 'arsip_sm.id_arsip_sm', '=', 'disposisi.id_arsip_sm')
                        ->where('id_user_tujuan', Auth::user()->id_user);
            $total_sm = ArsipSuratMasuk::where('id_user', Auth::user()->id_user)
                    ->union($disposisi)
                    ->count();
        }
        $total_template = Template::where('status_template', 'disetujui')->count();

        return view('pages.dashboard', compact(['total_anggota', 'total_template', 'total_sk', 'total_sm']));
    }

    public function index()
    {
        $user = User::where('role', 'user')->orderBy('created_at', 'desc')->get();
        return view('pages.manajemen.index', compact('user'));
    }

    public function tambah()
    {
        try {
            return view('pages.manajemen.tambah');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function updateValidator(Request $request, $id_user)
    {
        try {
            $validator = $request->validator_data;
            $user = User::find($id_user);
            $user->update([
                'validator' => $validator
            ]);

            return response()->json(['message' => 'success'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'error'], 500);
        }
    }

    public function tambahData(Request $request)
    {
        try {
            $input = [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'password' => Hash::make($request->nik),
                'role' => 'user',
            ];

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $destinationPath = 'image/profile/';
                $namaFile = date('YmdHis').".".$foto->getClientOriginalExtension();
                $foto->move($destinationPath, $namaFile);
                $input['foto'] = "$namaFile";
            }

            if ($request->hasFile('ttd')) {
                $ttd = $request->file('ttd');
                $destinationPath = 'image/ttd/';
                $namaFile = date('YmdHis').".".$ttd->getClientOriginalExtension();
                $ttd->move($destinationPath, $namaFile);
                $input['ttd'] = "$namaFile";
            }

            User::create($input);

            return back()->with('success', 'Data berhasil disimpan !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function edit($id)
    {
        try {
            $user = User::find($id);
            return view('pages.manajemen.edit', compact('user'));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            $update = [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
            ];

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $destinationPath = "image/profile/";
                $namaFile = date('YmdHis').".".$foto->getClientOriginalExtension();
                $foto->move($destinationPath, $namaFile);
                $update['foto'] = "$namaFile";
                if (File::exists(public_path($destinationPath . $user->foto))) {
                    File::delete(public_path($destinationPath . $user->foto));
                }
            }

            if ($request->hasFile('ttd')) {
                $ttd = $request->file('ttd');
                $destinationPath = "image/ttd/";
                $namaFile = date('YmdHis').".".$ttd->getClientOriginalExtension();
                $ttd->move($destinationPath, $namaFile);
                $update['ttd'] = "$namaFile";
                if (File::exists(public_path($destinationPath . $user->ttd))) {
                    File::delete(public_path($destinationPath . $user->ttd));
                }
            }

            $user->update($update);

            return back()->with('success', 'Data berhasil diperbarui !');
        } catch (Exception $e) {
            dd($e->getMessage());
            return view('error.500');
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            if (File::exists(public_path("image/profile/" . $user->foto))) {
                File::delete(public_path("image/profile/" . $user->foto));
            }
            if (File::exists(public_path("image/ttd/" . $user->ttd))) {
                File::delete(public_path("image/ttd/" . $user->ttd));
            }
            $user->destroy($id);

            return back()->with('success', 'Data berhasil dihapus !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    // public function profile($id)
    // {
    //     try {
    //         $usr = User::findOrFail($id);
    //         return view('pages.profile.index', [
    //             'usr' => $usr
    //         ]);
    //     }
    //         catch (Exception $e) {
    //         return view('error.500');
    //     }
    // }


    public function profileUpdate(Request $request, $id)
    {
        try {
            $usr = User::find($id);

            $update = [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
            ];

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $destinationPath = "image/profile/";
                $namaFile = date('YmdHis').".".$foto->getClientOriginalExtension();
                $foto->move($destinationPath, $namaFile);
                $update['foto'] = "$namaFile";
                if (
                        File::exists(public_path($destinationPath . $usr->foto
                        )
                        )
                    )
                    {
                        File::delete(public_path($destinationPath . $usr->foto
                        )
                    );
                }
            }

            if ($request->hasFile('ttd')) {
                $ttd = $request->file('ttd');
                $destinationPath = "image/ttd/";
                $namaFile = date('YmdHis').".".$ttd->getClientOriginalExtension();
                $ttd->move($destinationPath, $namaFile);
                $update['ttd'] = "$namaFile";
                if (File::exists(public_path($destinationPath . $usr->ttd))) {
                    File::delete(public_path($destinationPath . $usr->ttd));
                }
            }

            $usr->update($update);

            return back()->with('success', 'Data berhasil diperbarui !');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\User;
use App\Models\Klasifikasi;
use Exception;
use Validator;
use Auth;

class TemplateSuratController extends Controller
{
    public function daftarTemplate()
    {
        try {
            $template = Template::select(
                'id_template', 'nama_template', 'status_template', 'read_validator', 'created_at'
            )
            ->where('id_pembuat', Auth::user()->id_user)
            ->orderBy('updated_at', 'desc')
            ->get();
            
            return view('pages.template.daftar', compact(['template']));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function tambahTemplate(Request $request)
    {
        try {
            if($request->isMethod('get')) {
                $validator = User::select('id_user', 'nama', 'role')->where('role', 'admin')->get();
                $klasifikasi = Klasifikasi::select('id_klasifikasi', 'nama')->get();
    
                return view('pages.template.tambah', compact(['validator', 'klasifikasi']));
            } else {
                $input = $request->all();
                $input['id_pembuat'] = Auth::user()->id_user;

                Template::create($input);

                return redirect('/template-surat/daftar-template');
            }
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function editTemplate(Request $request, $id)
    {
        try {
            if($request->isMethod('get')) {
                $template = Template::find($id);
                $validator = User::select('id_user', 'nama')->get();
                $klasifikasi = Klasifikasi::select('id_klasifikasi', 'nama')->get();
    
                return view('pages.template.edit', compact(['template', 'validator', 'klasifikasi']));
            } else {
                $input = $request->all();
                $input['status_template'] = 'pending';
                $input['read_validator'] = 0;
                $input['revisi'] = '';

                Template::find($id)->update($input);

                return redirect('/template-surat/daftar-template');
            }
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function deleteTemplate($id)
    {
        try {
            Template::destroy($id);

            return redirect('/template-surat/daftar-template');
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function approvalTemplate()
    {
        try {
            $template = Template::select(
                'id_template', 'nama_template', 'status_template', 'read_validator', 'created_at'
            )
            ->where('id_validator', Auth::user()->id_user)
            ->orderBy('created_at', 'desc')
            ->get();
            
            return view('pages.template.approval', compact(['template']));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function detailApprovalTemplate(Request $request)
    {
        try {
            $tp = Template::find($request->id_template);
            $tp->update([
                'read_validator' => 0
            ]);

            return view('pages.template.detail-approval', compact(['tp']));
        } catch (Exception $e) {
            return view('error.500');
        }
    }

    public function approval(Request $request)
    {
        try {
            if($request->status_template) {
                $template = Template::find($request->id_template);
                $template->update($request->except(['id_template']));
            } else {
                return back()->with('error', 'Pilih jenis validasi terlebih dahulu !');
            }

            return redirect('/template-surat/template-approval');
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

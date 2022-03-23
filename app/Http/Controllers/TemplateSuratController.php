<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
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
}

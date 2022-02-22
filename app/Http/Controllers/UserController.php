<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Validator;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('pages.manajemen.index');
    }

    public function tambah()
    {
        try {
            return view('pages.manajemen.tambah');
        } catch (Exception $e) {
            return view('error.500');
        }
    }
}

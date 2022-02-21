<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Validator;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function postLogin(Request $request)
    {
        try {
            $username = $request->username;
            $password = $request->password;

            $user = User::where('nik', $username)->orWhere('email', $username)->first();
            if($user) {
                if(Hash::check($password, $user->password)) {
                    Auth::login($user);
                    return redirect()->intended('/');
                }

                return back()->with('error', 'Password Salah !');
            } else {
                return back()->with('error', 'Gagal Login !');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
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
            $validate = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ]);

            if ($validate->fails()) {
                return back()->with('error', $validate->errors());
            }

            $username = $request->username;
            $password = $request->password;

            $user = User::where('nik', $username)->orWhere('email', $username)->first();
            if(Hash::check($password, $user->password)) {
                Auth::login($user);
                return redirect()->intended('/');
            }

            return back()->with('error', 'Gagal Login !');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

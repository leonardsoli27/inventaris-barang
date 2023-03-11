<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $dataLogin = $request->validate([
            'email' => ['required'],
            'password' => ['required']
       ]);

    //    dd($dataLogin);
       if (Auth::attempt($dataLogin)) {
           $request->session()->regenerate();
           toast('Berhasil Login','success');
           return redirect()->intended('/dashboard');
        } else {
            alert()->error('Gagal','Email atau Password Anda Mungkin Salah.');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        toast('Berhasil Logout','success');
        return redirect('/');
    }
}

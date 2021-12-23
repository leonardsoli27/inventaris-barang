<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_on = auth()->user()->email;
        // dd($user_on);
        $user = User::where('email','!=',$user_on)->get();
        return view('user.dftUser', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.tbhUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5',
            'role' => 'required'
        ]);

        $user['password'] = bcrypt($user['password']);
        User::create($user);
        alert()->success('Berhasil','User Berhasil Ditambahkan.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id_user', $id)->get();
        return view('user.edtUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id_user', $id)->get();

        $rules = [
            'nama' => 'required',
            'role' => 'required'
        ];

        if ($request->email != $user[0]->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validate = $request->validate($rules);

        User::where('id_user', $id)->update($validate);
        alert()->success('Berhasil','User Berhasil Diedit.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id_user', $id)->delete();
        alert()->success('Berhasil','User Berhasil Dihapus.');
        return back();
    }

    public function profil($id)
    {
        $user = User::where('id_user', $id)->get();
        return view('user.profil', compact('user'));
    }

    public function post_profil(Request $request, $id)
    {
        $user = User::where('id_user', $id)->get();

        $rules = [
            'nama' => 'required',
        ];

        if ($request->email != $user[0]->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validate = $request->validate($rules);

        User::where('id_user', $id)->update($validate);
        alert()->success('Berhasil','Profil Berhasil Diedit.');
        return back();
    }

    public function password(Request $request, $id)
    {
        $request->validate([
            'password_lama' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);

        $cekPassword = auth()->user()->password;

        $old_password = $request->password_lama;

        if (Hash::check($old_password, $cekPassword)) {
            User::where('id_user', $id)->update([
                'password' => bcrypt($request->get('password'))
            ]);

            alert()->success('Berhasil','Password Berhasil Diperbaharui.');
            return back();
        } else {
            alert()->error('Gagal','Password Gagal Diperbaharui.');
            return back();
        }
    }
}

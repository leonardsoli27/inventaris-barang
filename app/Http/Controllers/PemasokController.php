<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok = Pemasok::all();
        return view('pemasok.dftPemasok', compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasok.tbhPemasok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemasok = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:pemasok',
            'telepon' => 'required|unique:pemasok'
        ]);

        Pemasok::create($pemasok);
        alert()->success('Berhasil','Supplier Baru Berhasil Ditambahkan.');
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
        $pemasok = Pemasok::where('id_pemasok', $id)->get();
        return view('pemasok.edtPemasok', compact('pemasok'));
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
        $pemasok = Pemasok::where('id_pemasok', $id)->get();
        // dd($pemasok[0]->email);

        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
        ];

        if ($request->email != $pemasok[0]->email) {
            $rules['email'] = 'required|email|unique:pemasok';
        }

        if ($request->telepon != $pemasok[0]->telepon) {
            $rules['telepon'] = 'required|unique:pemasok';
        }

        $validate = $request->validate($rules);
        // dd($validate);

        Pemasok::where('id_pemasok', $id)->update($validate);
        alert()->success('Berhasil','Supplier Berhasil Diedit.');

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
        Pemasok::where('id_pemasok', $id)->delete();
        alert()->success('Berhasil','Supplier Berhasil Dihapus.');
        return back();
    }
}

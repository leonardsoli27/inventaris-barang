<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $thn = Carbon::now()->year;
        $var = 'KT';
        $kts = Kategori::count();
        if ($kts == 0) {
            $awal = 10001;
            $kode_kt = $var.$thn.$awal;
            // kt2021001
        } else {
           $last = Kategori::all()->last();
           $awal = (int)substr($last->kode_kategori, -5) + 1;
           $kode_kt = $var.$thn.$awal;
        }
        return view('kategori.dftKategori', compact('kategori', 'kode_kt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = $request->validate([
            'kode_kategori' => 'required',
            'kategori' => 'required'
        ]);

        Kategori::create($kategori);
        alert()->success('Berhasil','Kategori Baru Berhasil Ditambahkan.');
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
        //
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
        $validate = $request->validate(['kategori' => 'required']);
        Kategori::where('id_kategori', $id)->update($validate);
        alert()->success('Berhasil','Kategori Berhasil Diedit.');
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
        Kategori::where('id_kategori', $id)->delete();
        alert()->success('Berhasil','Kategori Berhasil Dihapus.');
        return back();
    }
}

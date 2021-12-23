<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangMasukSementara;
use App\Models\Kategori;
use App\Models\Pemasok;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk = BarangMasuk::all();
        return view('barang.barang masuk.dftBarangMasuk', compact('barang_masuk'));
    }


    public function create()
    {
        $supplier = Pemasok::orderBy('nama', 'asc')->get();

        $thn = Carbon::now()->year;
        $var = 'BM';
        $bms = BarangMasuk::count();
        if ($bms == 0) {
            $awal = 10001;
            $kode_bm = $var.$thn.$awal;
            // BM2021001
        } else {
           $last = BarangMasuk::all()->last();
           $awal = (int)substr($last->kode_bm, -5) + 1;
           $kode_bm = $var.$thn.$awal;
        }

        return view('barang.barang masuk.tbhBarangMasuk', compact('supplier', 'kode_bm'));

    }

    public function get_barang($id)
    {
        $supplier = Pemasok::orderBy('nama', 'asc')->get();
        $produk = Barang::where('pemasok_id', $id)->get();
        // dd($produk);

        $thn = Carbon::now()->year;
        $var = 'BM';
        $bms = BarangMasuk::count();
        if ($bms == 0) {
            $awal = 10001;
            $kode_bm = $var.$thn.$awal;
            // BM2021001
        } else {
           $last = BarangMasuk::all()->last();
           $awal = (int)substr($last->kode_bm, -5) + 1;
           $kode_bm = $var.$thn.$awal;
        }

        return view('barang.barang masuk.tbhBarangMasuk', compact('supplier', 'kode_bm', 'produk', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate(['tgl_masuk' => 'required']);

        $kode_bm = $request->kode_bm;
        $id_barang = $request->id_barang;
        $supplier = $request->supplier;
        $kategori_id = $request->kategori_id;
        $nama_barang = $request->nama;
        $harga_ambil = $request->harga_ambil;
        $jumlah = $request->jumlah;
        $tgl = $request->tgl_masuk;
        $satuan = $request->satuan;
        // dd($request->all());

        foreach ($jumlah as $key => $value) {
            if ($value == 0) {
                continue;
            }
            // dd($value);
            $dt_produk = Barang::where('id_barang', $id_barang[$key])->first();
            Barang::where('id_barang', $id_barang[$key])->update([
                'jumlah' => $dt_produk->jumlah + $jumlah[$key]
            ]);
            BarangMasuk::insert([
                'kode_bm' => $kode_bm,
                'kategori_id' => $kategori_id[$key],
                'pemasok_id' => $supplier,
                'nama' => $nama_barang[$key],
                'jumlah' => $jumlah[$key],
                'satuan' => $satuan[$key],
                'harga' => $harga_ambil[$key],
                'tot_pengeluaran' => $harga_ambil[$key] * $jumlah[$key],
                'tanggal' => $tgl,
            ]);

        }

        alert()->success('Berhasil','Data Barang Berhasil Ditambahkan.');
        return redirect('/tbhBarang_masuk');

    }

    public function edit($id)
    {
       $barang = BarangMasuk::where('id_barang_masuk', $id)->get();

       return view('');
    }

    public function delete($id)
    {
        BarangMasuk::where('id_barang_masuk', $id)->delete();

        return back();
    }
}

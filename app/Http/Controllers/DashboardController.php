<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count('id_barang');
        $barang_masuk = BarangMasuk::count('id_barang_masuk');
        $barang_keluar = BarangKeluar::count('id_barang_keluar');
        return view('dashboard', compact('barang', 'barang_masuk', 'barang_keluar'));
    }

    public function laporan()
    {
        return view('laporan.laporan');
    }

    public function cetak_laporan(Request $request)
    {
        $request->validate([
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'jenis_laporan' => 'required'
        ]);

        $dari = $request->tgl_awal;
        $sampai = $request->tgl_akhir;
        $jenis = $request->jenis_laporan;
        $cek = Carbon::today();
        $hari_ini = $cek->toDateString();

        if ($dari > $sampai) {
            alert()->error('Data Gagal Dicetak','Tanggal Akhir Melebihi Tanggal Awal.');
            return back();
        }

        if ($dari > $hari_ini) {
            alert()->error('Data Gagal Dicetak.','Tanggal Awal Melebihi Hari Ini.');
            return back();
        }

        if ( $sampai > $hari_ini) {
            alert()->error('Data Gagal Dicetak.','Tanggal Akhir Melebihi Hari Ini.');
            return back();
        }

        if ($jenis == 'masuk') {
            $data_masuk = BarangMasuk::where('tanggal', '>=', $dari)
                        ->where('tanggal', '<=', $sampai)->get();
            // dd($data_masuk);
            $pdf = PDF::loadView('laporan.laporanBm', compact('data_masuk', 'dari', 'sampai'))->setPaper('A4', 'landscape');
            return $pdf->stream('Laporan Barang Masuk.pdf');
        } else {
            $data_keluar = BarangKeluar::where('tanggal', '>=', $dari)
                        ->where('tanggal', '<=', $sampai)->get();
            $pdf = PDF::loadView('laporan.laporanBk', compact('data_keluar', 'dari', 'sampai'))->setPaper('A4', 'landscape');
            return $pdf->stream('Laporan Barang Keluar.pdf');
        }
    }
}

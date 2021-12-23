<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';
    protected $fillable = [
        'kode_bm',
        'kategori_id',
        'pemasok_id',
        'nama',
        'jumlah',
        'satuan',
        'harga',
        'tanggal',
        'gambar',
        'status'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }
}

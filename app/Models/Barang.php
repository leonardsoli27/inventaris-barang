<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'kode_barang',
        'kategori_id',
        'pemasok_id',
        'nama',
        'jumlah',
        'satuan',
        'harga_ambil',
        'harga_jual',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }

    public function barang_k()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}

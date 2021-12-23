<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'kode_kategori',
        'kategori'
    ];

    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}

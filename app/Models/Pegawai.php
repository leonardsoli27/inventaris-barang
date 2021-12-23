<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'kode_pegawai',
        'nama_pegawai',
        'email'
    ];

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

}

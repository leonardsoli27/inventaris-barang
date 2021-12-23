<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;
    protected $table = 'pemasok';
    protected $primaryKey = 'id_pemasok';
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'telepon',
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

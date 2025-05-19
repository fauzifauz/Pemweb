<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama', 'stok', 'lokasi_penyimpanan_id'];

    public function lokasi()
    {
        return $this->belongsTo(LokasiPenyimpanan::class, 'lokasi_penyimpanan_id');
    }

    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
    public function lokasiPenyimpanan()
    {
        return $this->belongsTo(LokasiPenyimpanan::class);
    }
}

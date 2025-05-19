<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'tanggal', 'jumlah', 'keperluan'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    protected static function booted()
    {
        static::created(function ($keluar) {
            $keluar->barang->decrement('stok', $keluar->jumlah);
        });
    }
}

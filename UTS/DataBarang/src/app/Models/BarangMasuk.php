<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'tanggal', 'jumlah', 'supplier'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    protected static function booted()
    {
        static::created(function ($masuk) {
            $masuk->barang->increment('stok', $masuk->jumlah);
        });
    }
}

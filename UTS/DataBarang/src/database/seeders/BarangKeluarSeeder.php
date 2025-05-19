<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BarangKeluar;

class BarangKeluarSeeder extends Seeder
{
    public function run(): void
    {
        BarangKeluar::create([
            'barang_id' => 2,
            'tanggal' => now()->toDateString(),
            'jumlah' => 5,
            'keperluan' => 'Pengiriman ke toko'
        ]);
    }
}

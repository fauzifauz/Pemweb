<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BarangMasuk;

class BarangMasukSeeder extends Seeder
{
    public function run(): void
    {
        BarangMasuk::create([
            'barang_id' => 1,
            'tanggal' => now()->toDateString(),
            'jumlah' => 10,
            'supplier' => 'PT. Supplier Jaya'
        ]);
    }
}

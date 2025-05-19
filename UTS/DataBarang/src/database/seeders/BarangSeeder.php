<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        Barang::insert([
            [
                'kode' => 'ZEG001',
                'nama' => 'Kemeja Pria',
                'stok' => 50,
                'lokasi_penyimpanan_id' => 1
            ],
            [
                'kode' => 'SEP002',
                'nama' => 'Celana Jeans',
                'stok' => 70,
                'lokasi_penyimpanan_id' => 2
            ]
        ]);
    }
}

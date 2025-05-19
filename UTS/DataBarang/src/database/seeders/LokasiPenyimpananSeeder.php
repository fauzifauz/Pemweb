<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LokasiPenyimpanan;

class LokasiPenyimpananSeeder extends Seeder
{
    public function run(): void
    {
        LokasiPenyimpanan::insert([
            ['nama' => 'Rak A'],
            ['nama' => 'Rak B'],
            ['nama' => 'Rak C'],
        ]);
    }
}
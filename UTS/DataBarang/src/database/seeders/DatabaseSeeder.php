<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role jika belum ada
        $role = Role::firstOrCreate(['name' => 'super_admin']);

        // Cek user admin, jika belum ada baru dibuat
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // Ganti kalau perlu
                'email_verified_at' => now(),
            ]
        );

        // Assign role jika belum punya
        if (!$user->hasRole('super_admin')) {
            $user->assignRole($role);
        }

        // Jalankan seeder lainnya
        $this->call([
            LokasiPenyimpananSeeder::class,
            BarangSeeder::class,
            BarangMasukSeeder::class,
            BarangKeluarSeeder::class,
        ]);
    }
}

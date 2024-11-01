<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data sampel untuk tabel Pelanggan
        Pelanggan::create([
            'nama' => 'Andi Setiawan',
            'nomor_meja' => 1,
            'kontak' => '081234567890',
        ]);

        Pelanggan::create([
            'nama' => 'Budi Santoso',
            'nomor_meja' => 2,
            'kontak' => '081987654321',
        ]);

        Pelanggan::create([
            'nama' => 'Citra Larasati',
            'nomor_meja' => 3,
            'kontak' => '081223344556',
        ]);

        Pelanggan::create([
            'nama' => 'Dian Purnama',
            'nomor_meja' => 4,
            'kontak' => null, // Tidak memiliki kontak
        ]);
    }
}

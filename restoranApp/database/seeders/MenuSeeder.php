<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data sampel untuk tabel Menu
        Menu::create([
            'nama_hidangan' => 'Nasi Goreng',
            'kategori' => 'Makanan Utama',
            'harga' => 25000,
            'ketersediaan' => true,
        ]);

        Menu::create([
            'nama_hidangan' => 'Es Teh',
            'kategori' => 'Minuman',
            'harga' => 5000,
            'ketersediaan' => true,
        ]);

        Menu::create([
            'nama_hidangan' => 'Pisang Goreng',
            'kategori' => 'Makanan Penutup',
            'harga' => 15000,
            'ketersediaan' => true,
        ]);

        Menu::create([
            'nama_hidangan' => 'Mie Goreng',
            'kategori' => 'Makanan Utama',
            'harga' => 20000,
            'ketersediaan' => false,
        ]);
    }
}

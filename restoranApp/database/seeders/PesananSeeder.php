<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Menu;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil beberapa data pelanggan dan menu untuk membuat pesanan
        $pelanggan1 = Pelanggan::find(1);
        $pelanggan2 = Pelanggan::find(2);

        $menu1 = Menu::find(1);
        $menu2 = Menu::find(2);
        $menu3 = Menu::find(3);

        // Buat pesanan pertama
        $pesanan1 = Pesanan::create([
            'pelanggan_id' => $pelanggan1->id,
            'status' => 'sedang disiapkan',
            'tanggal_pesanan' => now()->toDateString(),
        ]);
        $pesanan1->menus()->attach([$menu1->id, $menu2->id]); // Tambahkan menu ke pesanan pertama

        // Buat pesanan kedua
        $pesanan2 = Pesanan::create([
            'pelanggan_id' => $pelanggan2->id,
            'status' => 'siap diantar',
            'tanggal_pesanan' => now()->toDateString(),
        ]);
        $pesanan2->menus()->attach([$menu2->id, $menu3->id]); // Tambahkan menu ke pesanan kedua

        // Buat pesanan ketiga
        $pesanan3 = Pesanan::create([
            'pelanggan_id' => $pelanggan1->id,
            'status' => 'sudah selesai',
            'tanggal_pesanan' => now()->subDay()->toDateString(),
        ]);
        $pesanan3->menus()->attach([$menu1->id]); // Tambahkan menu ke pesanan ketiga
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes; // Mengaktifkan soft delete untuk data menu

    // Nama tabel di database
    protected $table = 'menus';

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'nama_hidangan',
        'kategori',
        'harga',
        'ketersediaan',
    ];

    // Menggunakan timestamps
    public $timestamps = true;

    // Relasi dengan model Pesanan (satu menu bisa dimiliki oleh banyak pesanan melalui tabel pivot)
    public function pesanans()
    {
        return $this->belongsToMany(Pesanan::class, 'menu_pesanan');
    }
}

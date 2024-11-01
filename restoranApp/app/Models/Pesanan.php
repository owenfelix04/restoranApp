<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesanan extends Model
{
    use SoftDeletes; // Mengaktifkan soft delete untuk data pesanan

    // Nama tabel di database
    protected $table = 'pesanans';

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'pelanggan_id',
        'status',
        'tanggal_pesanan',
    ];

    // Menggunakan timestamps
    public $timestamps = true;

    // Relasi dengan model Pelanggan (satu pesanan hanya dimiliki oleh satu pelanggan)
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    // Relasi dengan model Menu (satu pesanan bisa memiliki banyak menu melalui tabel pivot)
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_pesanan');
    }
}

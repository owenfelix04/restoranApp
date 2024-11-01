<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    // Definisikan nama tabel jika berbeda dari nama model
    protected $table = 'pelanggans';

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'nama',
        'nomor_meja',
        'kontak',
    ];

    // Relasi dengan model Pesanan (satu pelanggan memiliki banyak pesanan)
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}

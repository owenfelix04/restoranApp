<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('nama_hidangan'); // Kolom nama hidangan
        $table->string('kategori'); // Kolom kategori
        $table->decimal('harga', 10, 2); // Kolom harga
        $table->boolean('ketersediaan')->default(true); // Kolom ketersediaan
        $table->timestamps();
        $table->softDeletes(); // Untuk soft delete
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

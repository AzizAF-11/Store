<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('produk_umkm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjual_id')->constrained('profil_penjual')->onDelete('cascade');
            $table->string('nama_produk');
            $table->text('bahan_baku');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('produk_umkm');
    }
};

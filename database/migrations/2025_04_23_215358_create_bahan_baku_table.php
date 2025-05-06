<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyedia_id')->constrained('profil_penyedia')->onDelete('cascade');
            $table->string('nama_bahan');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->string('satuan');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('bahan_baku');
    }
};

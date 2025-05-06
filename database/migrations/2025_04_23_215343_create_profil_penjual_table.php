<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('profil_penjual', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_umkm');
            $table->text('jenis_produk');
            $table->string('lokasi');
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade'); 
            $table->foreignId('regency_id')->constrained('regencies')->onDelete('cascade');  
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade'); 
            $table->timestamps();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('profil_penjual');
    }
    
};

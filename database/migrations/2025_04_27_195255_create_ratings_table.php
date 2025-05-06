<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_umkm_id')->constrained('produk_umkm')->onDelete('cascade')->nullbale();
            $table->foreignId('bahan_baku__id')->constrained('bahan_baku')->onDelete('cascade')->nullbale();
            $table->integer('total_rating')->default(0);
            $table->integer('rating_count')->default(0);
            $table->float('average_rating', 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('ratings');
    }
};


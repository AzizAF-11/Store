<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bahan_baku', function (Blueprint $table) {
            $table->string('kode_bahan')->unique()->after('penyedia_id');
            $table->string('slug')->unique()->after('nama_bahan');
            $table->decimal('berat', 8, 2)->nullable()->after('satuan');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->after('image');
            $table->date('tanggal_kadaluwarsa')->nullable()->after('status');
            $table->integer('min_pembelian')->default(1)->after('tanggal_kadaluwarsa');
            $table->integer('maks_pembelian')->nullable()->after('min_pembelian');
            $table->decimal('diskon', 5, 2)->nullable()->after('maks_pembelian');
            $table->foreignId('kategori_id')->nullable()->constrained('kategori_bahan')->onDelete('set null')->after('diskon');
        });
    }

    public function down(): void
    {
        Schema::table('bahan_baku', function (Blueprint $table) {
            $table->dropColumn([
                'kode_bahan',
                'slug',
                'berat',
                'status',
                'tanggal_kadaluwarsa',
                'min_pembelian',
                'maks_pembelian',
                'diskon',
                'kategori_id',
            ]);
        });
    }
};

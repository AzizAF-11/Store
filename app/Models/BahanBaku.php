<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';

    protected $fillable = ['id', 'penyedia_id', 'nama_bahan_baku', 'satuan', 'harga', 'stok', 'deskripsi'];
}

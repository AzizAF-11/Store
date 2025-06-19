<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriBahan extends Model
{
    use HasFactory;

    protected $table = 'kategori_bahan'; 

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function bahanBaku()
    {
        return $this->hasMany(BahanBaku::class, 'kategori_id');
    }
}

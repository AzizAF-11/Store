<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ratings extends Model
{
    use HasFactory;

    protected $table = 'ratings'; 
    protected $fillable = [
        'product_umkm_id',
        'bahan_baku__id',
        'total_rating',
        'rating_count',
        'average_rating',
    ];

    /**
     * Relasi ke bahan baku
     */
    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku__id');
    }
}

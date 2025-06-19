<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';

    protected $fillable = ['id', 'penyedia_id', 'nama_bahan_baku', 'satuan', 'harga', 'stok', 'deskripsi'];

    public function penyedia()
    {
        return $this->belongsTo(Penyedia::class);
    }

    // app/Models/BahanBaku.php

    public function rating()
    {
        return $this->hasOne(Ratings::class, 'bahan_baku__id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'bahan_baku_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBahan::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyedia extends Model
{
    use HasFactory;

    protected $table = 'profil_penyedia';

    protected $fillable = ['id', 'user_id', 'nama_toko', 'lokasi', 'province_id', 'regency_id', 'district_id'];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bahanBaku()
    {
        return $this->hasMany(BahanBaku::class, 'penyedia_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}

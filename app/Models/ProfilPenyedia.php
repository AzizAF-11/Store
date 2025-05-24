<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPenyedia extends Model
{
    use HasFactory;

    protected $table = 'profil_penyedia';

    protected $fillable = [
        'user_id',
        'nama_toko',
        'lokasi',
        'province_id',
        'regency_id',
        'district_id',
    ];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}

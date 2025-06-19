<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class District extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'regency_id', 'name'];
    public $incrementing = false;

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BahanBakuResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_bahan' => $this->nama_bahan,
            'kategori' => $this->kategori,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'gambar' => $this->gambar
                ? asset('storage/' . $this->gambar)
                : asset('https://archive.org/download/placeholder-image/placeholder-image.jpg'),
            'lokasi' => optional($this->penyedia?->regency)->name ?? 'Tidak diketahui',
            'rating' => optional($this->rating)->average_rating ?? 0,
        ];
    }

}


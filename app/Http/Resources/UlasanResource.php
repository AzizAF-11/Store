<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UlasanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'rating' => $this->rating,
            'komentar' => $this->komentar,
            'reviewer' => [
                'id' => $this->reviewer?->id,
                'name' => $this->reviewer?->name,
            ],
            'bahan_baku' => [
                'id' => $this->bahanBaku?->id,
                'nama' => $this->bahanBaku?->nama_bahan ?? null,
            ],
        ];
    }
}



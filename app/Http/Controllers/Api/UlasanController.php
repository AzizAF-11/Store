<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UlasanResource;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasan = Ulasan::with(['reviewer', 'bahanBaku'])->latest()->get();
        return UlasanResource::collection($ulasan);
    }
}

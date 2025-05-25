<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class BahanBaku extends Component
{
     public $limitRekomendasi = 5;
    public $limitSemua = 5;

    protected $defaultLimitRekomendasi = 5;
    protected $defaultLimitSemua = 5;
    protected $maxLimit = 10; // total dummy item

    public function loadMore1()
    {
        $this->limitRekomendasi = min($this->limitRekomendasi + 3, $this->maxLimit);
    }

    public function showLess1()
    {
        $this->limitRekomendasi = $this->defaultLimitRekomendasi;
    }

    public function loadMore2()
    {
        $this->limitSemua = min($this->limitSemua + 3, $this->maxLimit);
    }

    public function showLess2()
    {
        $this->limitSemua = $this->defaultLimitSemua;
    }

    public function render()
    {
        $dummyItems = collect(range(1, 10))->map(function ($i) {
            return [
                'id' => $i,
                'nama' => "Fermipan - Ragi instan (4 x 11 gr)",
                'deskripsi' => "instant yeast for baking",
                'harga' => 21000,
                'rating' => 4.5,
                'terjual' => 221,
                'lokasi' => "Semarang",
                'gambar' => asset('images/fermipan.png'),
            ];
        });

        $rekomendasiItems = $dummyItems->take($this->limitRekomendasi);
        $semuaItems = $dummyItems->take($this->limitSemua);

        return view('livewire.dashboard.bahan-baku', [
            'rekomendasiItems' => $rekomendasiItems,
            'semuaItems' => $semuaItems,
        ]);
    }
}

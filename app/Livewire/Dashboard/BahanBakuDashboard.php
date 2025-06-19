<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\BahanBaku;
use App\Http\Resources\BahanBakuResource;
use App\Models\Regency;

class BahanBakuDashboard extends Component
{
    public $limitRekomendasi = 5;
    public $limitSemua = 5;

    protected $defaultLimitRekomendasi = 5;
    protected $defaultLimitSemua = 5;
    protected $maxLimit = 10;

    public $rekomendasiItems = [];
    public $semuaItems = [];

    public $hargaMin = 0;
    public $hargaMax = 0;

    public $allRegencies = [];
    public $regencies = [];
    public $showAllRegencies = false;

    public $selectedRegencies = [];

    public $filterRating = false;

    public $searchQuery = '';

    protected $listeners = ['searchUpdated' => 'handleSearchUpdated'];

    public function handleSearchUpdated($query)
    {
        logger('Search updated:', ['query' => $query]);

        $this->searchQuery = $query;
        $this->fetchSemuaItems();
        $this->fetchRekomendasiItems();
    }


    public function fetchRegecies()
    {
        $this->allRegencies = Regency::orderBy('name')->get();
    }

    private function loadRegencies()
    {
        $query = Regency::orderBy('name');
        $this->regencies = $this->showAllRegencies
            ? $query->get()
            : $query->limit(4)->get();
    }

    public function mount()
    {
        $this->fetchRekomendasiItems();
        $this->fetchSemuaItems();
        $this->fetchRegecies();
        $this->loadRegencies();
    }

    public function loadMore1()
    {
        $this->limitRekomendasi = min($this->limitRekomendasi + 3, $this->maxLimit);
        $this->fetchRekomendasiItems();
    }

    public function showLess1()
    {
        $this->limitRekomendasi = $this->defaultLimitRekomendasi;
        $this->fetchRekomendasiItems();
    }

    public function loadMore2()
    {
        $this->limitSemua = min($this->limitSemua + 5, $this->maxLimit);
        $this->fetchSemuaItems();
    }

    public function showLess2()
    {
        $this->limitSemua = $this->defaultLimitSemua;
        $this->fetchSemuaItems();
    }

    public function applyFilter()
    {
        $this->fetchRekomendasiItems();
        $this->fetchSemuaItems();
    }


    private function fetchRekomendasiItems()
    {
        try {
            $userId = Auth::id();

            $response = Http::timeout(3)->get("http://127.0.0.1:5001/api/recommendations", [
                'user_id' => $userId
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $recommendationIds = collect($data['recommendations']);

                $bahanBakus = BahanBaku::with('penyedia.regency', 'rating')
                    ->whereIn('id', $recommendationIds)
                    ->when($this->hargaMin, function ($query) {
                        $query->where('harga', '>=', $this->hargaMin);
                    })
                    ->when($this->hargaMax, function ($query) {
                        $query->where('harga', '<=', $this->hargaMax);
                    })
                    ->when(!empty($this->selectedRegencies), function ($query) {
                        $query->whereHas('penyedia', function ($q) {
                            $q->whereIn('regency_id', $this->selectedRegencies);
                        });
                    })

                    ->when($this->filterRating, function ($query) {
                        $query->whereHas('rating', function ($q) {
                            $q->where('average_rating', '>=', 4);
                        });
                    })

                    ->when($this->searchQuery, function ($query) {
                        $query->where('nama_bahan', 'like', '%' . $this->searchQuery . '%');
                    })


                    ->get()
                    ->sortBy(fn($item) => $recommendationIds->search($item->id))
                    ->take($this->limitRekomendasi)
                    ->values();


                $this->rekomendasiItems = BahanBakuResource::collection($bahanBakus)->resolve();

            } else {

                $this->rekomendasiItems = [];
            }
        } catch (\Exception $e) {

            $this->rekomendasiItems = [];
        }
    }


    private function fetchSemuaItems()
    {
        $bahanBakus = BahanBaku::with('penyedia.regency', 'rating')
            ->when($this->hargaMin, function ($query) {
                $query->where('harga', '>=', $this->hargaMin);
            })
            ->when($this->hargaMax, function ($query) {
                $query->where('harga', '<=', $this->hargaMax);
            })
            ->when(!empty($this->selectedRegencies), function ($query) {
                $query->whereHas('penyedia', function ($q) {
                    $q->whereIn('regency_id', $this->selectedRegencies);
                });
            })

            ->when($this->filterRating, function ($query) {
                $query->whereHas('rating', function ($q) {
                    $q->where('average_rating', '>=', 4);
                });
            })

            ->when($this->searchQuery, function ($query) {
                $query->where('nama_bahan', 'like', '%' . $this->searchQuery . '%');
            })


            ->inRandomOrder()
            ->limit($this->limitSemua)
            ->get();

        $this->semuaItems = BahanBakuResource::collection($bahanBakus)->resolve();
    }



    public function render()
    {
        return view('livewire.dashboard.bahan-baku-dashboard', [
            'rekomendasiItems' => $this->rekomendasiItems,
            'semuaItems' => $this->semuaItems,
        ]);
    }
}

<?php

namespace App\Livewire\DashboardPenjual\Product;

use App\Models\BahanBaku;
use App\Models\KategoriBahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $kode_bahan;
    public $nama_bahan;
    public $slug;
    public $harga;
    public $stok;
    public $satuan;
    public $berat;
    public $deskripsi;
    public $image;
    public $thumbnail;
    public $album1 = [];
    public $album2 = [];
    public $status = 'aktif';
    public $tanggal_kadaluwarsa;
    public $min_pembelian = 1;
    public $maks_pembelian;
    public $diskon;
    public $kategori_id;

    public $showForm = false;

    protected $rules = [
        'kode_bahan' => 'required|string|max:255|unique:bahan_baku,kode_bahan',
        'nama_bahan' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'satuan' => 'required|string|max:255',
        'berat' => 'nullable|numeric|min:0',
        'deskripsi' => 'nullable|string',
        'thumbnail' => 'nullable|image|max:2048',
        'album1.*' => 'nullable|image|max:2048',
        'album2.*' => 'nullable|image|max:2048',
        'status' => 'required|in:aktif,nonaktif',
        'tanggal_kadaluwarsa' => 'nullable|date',
        'min_pembelian' => 'nullable|integer',
        'maks_pembelian' => 'nullable|integer|min:1',
        'diskon' => 'nullable|numeric|min:0|max:100',
        'kategori_id' => 'nullable|exists:kategori_bahan,id',
    ];

    public function updatedNamaBahan($value)
    {
        $this->slug = Str::slug($value);
    }

    public function createProduct()
    {
        if (!$this->kode_bahan) {
            $this->generateKodeBahan();
        }
        
        $this->album1 = $this->album1 ?? [];
        $this->album2 = $this->album2 ?? [];

        $this->validate();

        try {
            $penyediaId = Auth::user()->profilePenyedia->id ?? null;
            if (!$penyediaId) {
                session()->flash('error', 'Profil penyedia tidak ditemukan.');
                return;
            }

            $thumbnailPath = $this->thumbnail?->store('produk/thumbnail', 'public');

            $album1Paths = [];
            foreach ($this->album1 as $foto) {
                $album1Paths[] = $foto->store('produk/album1', 'public');
            }

            $album2Paths = [];
            foreach ($this->album2 as $foto) {
                $album2Paths[] = $foto->store('produk/album2', 'public');
            }

            BahanBaku::create([
                'penyedia_id' => $penyediaId,
                'kode_bahan' => $this->kode_bahan,
                'nama_bahan' => $this->nama_bahan,
                'slug' => Str::slug($this->nama_bahan),
                'harga' => $this->harga,
                'stok' => $this->stok,
                'satuan' => $this->satuan,
                'berat' => $this->berat,
                'deskripsi' => $this->deskripsi,
                'image' => json_encode([
                    'thumbnail' => $thumbnailPath,
                    'album1' => $album1Paths,
                    'album2' => $album2Paths,
                ]),
                'status' => $this->status,
                'tanggal_kadaluwarsa' => $this->tanggal_kadaluwarsa,
                'min_pembelian' => $this->min_pembelian,
                'maks_pembelian' => $this->maks_pembelian,
                'diskon' => $this->diskon,
                'kategori_id' => $this->kategori_id,
            ]);

            session()->flash('success', 'Produk berhasil ditambahkan.');
            $this->resetForm();
            $this->dispatch('changeTab', 'list');
        } catch (\Exception $e) {
            \Log::error('Gagal membuat produk', ['error' => $e]);
            session()->flash('error', 'Gagal menyimpan produk: ' . $e->getMessage());
        }
    }

    public function removeImageFromAlbum($album, $index)
    {
        if ($album == 1 && isset($this->album1[$index])) {
            unset($this->album1[$index]);
            $this->album1 = array_values($this->album1);
        } elseif ($album == 2 && isset($this->album2[$index])) {
            unset($this->album2[$index]);
            $this->album2 = array_values($this->album2);
        }
    }

    public function removeThumbnail()
    {
        $this->thumbnail = null;
    }

    public function cancelCreate()
    {
        $this->dispatch('changeTab', 'list')->to(Index::class);
    }

    public function resetForm()
    {
        $this->reset([
            'kode_bahan',
            'nama_bahan',
            'slug',
            'harga',
            'stok',
            'satuan',
            'berat',
            'deskripsi',
            'thumbnail',
            'album1',
            'album2',
            'status',
            'tanggal_kadaluwarsa',
            'min_pembelian',
            'maks_pembelian',
            'diskon',
            'kategori_id'
        ]);
    }

    public function generateKodeBahan()
    {
        $tanggal = now()->format('ymd');
        $random = strtoupper(Str::random(4));

        $this->kode_bahan = "BB-{$tanggal}-{$random}";
    }

    public function render()
    {
        return view('livewire.dashboard-penjual.product.create-product', [
            'kategoris' => KategoriBahan::all(),
        ]);
    }
}

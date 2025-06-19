<?php

namespace App\Livewire\DashboardPenjual\Product;

use Livewire\Component;

class Index extends Component
{
    public $tab = 'list';

    protected $listeners = ['changeTab' => 'setTab'];

    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function goToCreate()
    {
        $this->tab = 'create';
        
    }

    public function render()
    {
        return view('livewire.dashboard-penjual.product.index', [
            'tab' => $this->tab,
        ]);
    }
}

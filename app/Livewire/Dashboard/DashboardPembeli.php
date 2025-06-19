<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardPembeli extends Component
{

    public $activeTab = 'bahan-baku';

    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('searchUpdated', $this->search);
    }


    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-pembeli');
    }
}

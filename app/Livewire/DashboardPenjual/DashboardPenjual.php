<?php

namespace App\Livewire\DashboardPenjual;

use Livewire\Component;

class DashboardPenjual extends Component
{
    public string $currentTab = 'dashboard';

    protected $queryString = ['currentTab'];
    protected $listeners = ['changeTab' => 'setTab'];

    public function setTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function render()
    {
        return view('livewire.dashboard-penjual.dashboard');
    }
}

<?php

namespace App\Livewire\DashboardPenjual;

use Livewire\Component;

class SideNavbar extends Component
{
    public $currentTab;

    protected $listeners = ['currentTabUpdated' => 'updateTab'];

    public function mount()
    {
        $this->currentTab = request()->query('currentTab', 'dashboard');
    }

    public function changeTo($tab)
    {
        $this->currentTab = $tab;
        $this->dispatch('changeTab', $tab);
        $this->dispatch('currentTabUpdated', $tab);
    }

    public function updateTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function render()
    {
        return view('livewire.dashboard-penjual.side-navbar');
    }
}

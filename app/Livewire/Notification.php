<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    protected $listeners = ['showNotification'];

    public $type;
    public $message;

    public function showNotification($data)
    {
        $this->type = $data['type'];
        $this->message = $data['message'];

        $this->dispatch('notification-timer');
    }

    public function render()
    {
        return view('livewire.notification');
    }
}

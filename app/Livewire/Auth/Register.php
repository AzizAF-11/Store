<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:password_confirmation',
        ]);

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'pencari bahan baku',
            ]);

            $this->reset(['name', 'email', 'password', 'password_confirmation']);

            $this->dispatch('showNotification', [
                'type' => 'success',
                'message' => 'Account created successfully. Please login.',
            ]);

            $this->dispatch('close-register-modal');
            $this->dispatch('open-login-modal');

        } catch (\Exception $e) {
            
            $this->dispatch('showNotification', [
                'type' => 'error',
                'message' => 'Gagal registrasi: ' . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}

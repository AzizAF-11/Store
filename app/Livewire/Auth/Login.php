<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            // Ambil user yang sudah login
            $user = Auth::user();

            // Cek role dan redirect sesuai
            if ($user->role === 'pencari bahan baku') {
                return $this->redirect('/dashboard');
            }

            $this->dispatch('showNotification', [
                'type' => 'success',
                'message' => 'Account created successfully. Please login.',
            ]);

            $this->dispatch('close-login-modal'); 
        } else {
            $this->addError('email', 'Email atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

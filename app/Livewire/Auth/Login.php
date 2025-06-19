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

            $user = Auth::user();

            if ($user->role === 'pencari bahan baku') {
                return $this->redirect('/dashboard');
            } elseif ($user->role === 'penyedia bahan baku') {
                return $this->redirect('/dashboard-penjual');
            }

            Auth::logout();
            $this->addError('email', 'Role tidak dikenali.');
            return;
        } else {
            $this->addError('email', 'Email atau password salah.');
        }
    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}

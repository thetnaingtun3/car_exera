<?php

namespace App\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class TransoperLogin extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount()
    {
        if (auth()->guard('admin')->user()) {
            return redirect('/dashboard');
        }
        $this->fill(['email' => 'transoper@gmail.com', 'password' => 'password']);
    }

    #[Title('Transoper Login')]
    public function render()
    {
        return view('livewire.login.transoper-login')
            ->layout('custom.app');

    }

    public function login()
    {
        $credentials = $this->validate();
        $data = Auth::guard('admin')->attempt($credentials);
        if ($data) {
            return redirect()->route('dashboard');
        } else {
            return to_route('login');
        }
    }
}

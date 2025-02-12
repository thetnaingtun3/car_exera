<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public $name = '';
    public $password = '';

    protected $rules = [
        'name' => 'required',
        'password' => 'required',
    ];

    public function mount()
    {
        if (auth()->guard('admin')->user()) {
            return redirect('/dashboard');
        }
    }

    public function login()
    {
        $credentials = $this->validate();

        // Use 'name' instead of 'email' for authentication
        if (Auth::guard('admin')->attempt(['name' => $this->name, 'password' => $this->password])) {
            return redirect()->route('dashboard');
        } else {
            return to_route('login');
        }
    }

    #[Title('Admin Login')]
    public function render()
    {
        return view('livewire.login')
            ->layout('custom.app');
    }
}

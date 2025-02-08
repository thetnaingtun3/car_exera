<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
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
       // $this->fill(['email' => 'root@admin.com', 'password' => 'password']);
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

    #[Title('Admin Login')]
    public function render()
    {
        return view('livewire.login')
            ->layout('custom.app');
    }
}

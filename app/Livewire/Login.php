<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        //        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount()
    {
        if (auth()->guard('admin')->user()) { // Change to guard for admin
            return redirect('/dashboard');
        }
        $this->fill(['email' => 'admin@gmail.com', 'password' => 'password']);
    }

    public function login()
    {
        $credentials = $this->validate();

        $data = Auth::guard('admin')->attempt($credentials);
        // // i want to assigin rol to admin
        // $admin = Auth::guard('admin')->user();
        // $admin->assignRole('admin');
        if ($data) {
            return redirect()->route('dashboard');
        } else {
            return to_route('login');
        }
    }

    public function render()
    {
        return view('livewire.login')
            ->layout('custom.app')
            ->layoutData(['title' => 'Admin Login']);
    }
}

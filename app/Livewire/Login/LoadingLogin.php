<?php

namespace App\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class LoadingLogin extends Component
{
    public $name = ''; // Using 'name' instead of email for login
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

        // Set default values (for testing purposes, optional)
       // $this->fill(['name' => 'loading', 'password' => 'password']);
    }

    #[Title('Loading Login')]
    public function render()
    {
        return view('livewire.login.loading-login')->layout('custom.app');
    }

    public function login()
    {
        // Validate input
        $credentials = $this->validate();

        // Attempt login using the 'name' field
        $authenticated = Auth::guard('admin')->attempt([
            'name' => $this->name,
            'password' => $this->password,
        ]);

        if ($authenticated) {
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Invalid name or password.');
            return to_route('loading.login');
        }
    }
}

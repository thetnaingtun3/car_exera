<?php

namespace App\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductionLogin extends Component
{
    public $name = ''; // Corrected to use 'name'
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

        // Default testing values (optional, remove in production)
    //    $this->fill(['name' => 'production', 'password' => 'password']);
    }

    #[Title('Production Login')]
    public function render()
    {
        return view('livewire.login.production-login')->layout('custom.app');
    }

    public function login()
    {
        // Validate the input
        $credentials = $this->validate();

        // Attempt login using 'name' and 'password'
        $authenticated = Auth::guard('admin')->attempt([
            'name' => $this->name,
            'password' => $this->password,
        ]);

        if ($authenticated) {
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'User and Password are wrong, please try again.');
            return to_route('production.login');
        }
    }
}

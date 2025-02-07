<?php

namespace App\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class TransoperLogin extends Component
{

    public $name = ''; // Username field is now called 'name'
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

        // Set default values for testing (optional, can be removed)
        $this->fill(['name' => 'lsp', 'password' => 'password']);
    }

    #[Title('Transoper Login')]
    public function render()
    {
        return view('livewire.login.transoper-login')
            ->layout('custom.app');
    }

    public function login()
    {
        // Validate the input fields
        $credentials = $this->validate();

        // Attempt login using 'name' as the identifier
        $authenticated = Auth::guard('admin')->attempt([
            'name' => $this->name,
            'password' => $this->password
        ]);

        if ($authenticated) {
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Invalid name or password.');
            return to_route('registration.login');
        }
    }
}

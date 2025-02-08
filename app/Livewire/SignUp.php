<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SignUp extends Component
{
    public function render()
    {

        return view('livewire.sign-up');
    }

    public $name = '';

    public $title = 'asfdsdfsd';
    public $email = '';

    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6',
    ];

    public function mount()
    {
        if (auth()->user()) {
            redirect('/dashboard');
        }
    }

    public function register()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }
}

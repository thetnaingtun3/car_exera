<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.logout');
    }

    public function logout()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->hasRole('root-admin') || $user->hasRole('admin')) {
                Auth::logout();
                return redirect()->to('/login');
            }

            if ($user->hasRole('registration')) {
                Auth::logout();
                return redirect()->to('/registration/login');
            }

            if ($user->hasRole('loading')) {
                Auth::logout();
                return redirect()->to('/loading/login');
            }

            if ($user->hasRole('production')) {
                Auth::logout();
                return redirect()->to('/production/login');
            }

            Auth::logout();
            return redirect()->to('/login');
        }

        return redirect()->to('/login');
    }
}

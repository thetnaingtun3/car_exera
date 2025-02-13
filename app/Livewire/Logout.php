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
            $roleName = strtolower($user->name); 

            Auth::logout(); 

            switch ($roleName) {
                case 'root-admin':
                case 'admin':
                    return redirect()->to('/login');
                case 'transporter':
                    return redirect()->to('/registration/login');
                case 'loading':
                    return redirect()->to('/loading/login');
                case 'production':
                    return redirect()->to('/production/login');
                default:
                    return redirect()->to('/login'); 
            }
        }

        // return redirect()->to('/login'); 
    }
}

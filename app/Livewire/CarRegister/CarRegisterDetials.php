<?php

namespace App\Livewire\CarRegister;

use Livewire\Component;
use App\Models\CarRegistration;

class CarRegisterDetials extends Component
{
    public $registration;

    public function mount($registration)
    {

        $this->registration = CarRegistration::where('id', $registration)->with('products')->first();
    }
    public function render()
    {

        return view('livewire.car-register.car-register-detials');
    }
}

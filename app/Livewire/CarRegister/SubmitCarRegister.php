<?php

namespace App\Livewire\CarRegister;

use Livewire\Component;

class SubmitCarRegister extends Component
{



    /// public $lsps;
    public $lsp_id;
    public $licence_plate;
    public $vehicle_type;
    public $size;


    public function render()
    {
        return view('livewire.car-register.submit-car-register');
    }
}

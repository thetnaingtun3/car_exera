<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\LSP;
use App\Models\Truck;
use Livewire\Attributes\Validate;

class TruckForm extends Form

{
    // 'lsp_id',
    //         'licence_plate',
    //         'vehicle_type',
    //         'size',
    public ?Truck $truck = null;

    public $lsp_id, $licence_plate, $vehicle_type, $size;

    public function setTruck(Truck $truck)
    {
        $this->truck = $truck;
        $this->lsp_id = $truck->lsp_id;
        $this->licence_plate = $truck->licence_plate;
        $this->vehicle_type = $truck->vehicle_type;
        $this->size = $truck->size;
    }
    public function store()
    {

        $this->truck = Truck::create([
            'lsp_id' => $this->lsp_id,
            'licence_plate' => $this->licence_plate,
            'vehicle_type' => $this->vehicle_type,
            'size' => $this->size,
        ]);
    }
    public function update()
    {
        $this->truck->update([
            'lsp_id' => $this->lsp_id,
            'licence_plate' => $this->licence_plate,
            'vehicle_type' => $this->vehicle_type,
            'size' => $this->size,
        ]);
    }
}

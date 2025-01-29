<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\LSP;
use App\Models\Truck;
use Livewire\Attributes\Validate;

class TruckForm extends Form

{
    //         'licence_plate',
    //         'vehicle_type',
    //         'size',
    public ?Truck $truck = null;

    public $lsp_id, $licence_plate, $vehicle_type, $size, $driver_name;

    public $status = 'active';

    public function setTruck(Truck $truck)
    {
        $this->truck = $truck;
        $this->lsp_id = $truck->lsp_id;
        $this->licence_plate = $truck->licence_plate;
        $this->vehicle_type = $truck->vehicle_type;
        $this->driver_name = $truck->driver_name;
        $this->size = $truck->size;
        $this->status = $truck->status;
    }
    public function store()
    {

        // validate
        $validatedData = $this->validate([
            'lsp_id' => 'required|integer',

        ]);
        $this->truck = Truck::create([
            'lsp_id' => $this->lsp_id,
            'licence_plate' => $this->licence_plate,
            'vehicle_type' => $this->vehicle_type,
            'driver_name' => $this->driver_name,
            'size' => $this->size,

            'status' => $this->status,
        ]);
    }
    public function update()
    {

        $this->truck->update([
            'lsp_id' => $this->lsp_id,
            'licence_plate' => $this->licence_plate,
            'vehicle_type' => $this->vehicle_type,
            'driver_name' => $this->driver_name,
            'size' => $this->size,

            'status' => $this->status,
        ]);
    }
}

<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Truck;

class TruckForm extends Form
{
    public ?Truck $truck = null;

    public $lsp_id, $licence_plate, $unit, $vehicle_type, $size, $driver_name;
    public $status = 'active';

    public function setTruck(Truck $truck)
    {
        $this->truck = $truck;
        $this->lsp_id = $truck->lsp_id;
        $this->licence_plate = $truck->licence_plate;
        $this->driver_name = $truck->driver_name;
        $this->size = (int) preg_replace('/[^0-9]/', '', $truck->size);
        preg_match('/[a-zA-Z]+$/', $truck->size, $matches);
        $this->unit = $matches[0] ?? '';

        $this->status = $truck->status;
    }

    public function store()
    {
        $this->validate([
            'lsp_id' => 'required|integer',
            'licence_plate' => 'required|regex:/^\d[A-Z]-\d{4}$/|unique:trucks,licence_plate',
        ]);

        $this->truck = Truck::create([
            'lsp_id' => $this->lsp_id,
            'licence_plate' => $this->licence_plate,
            'driver_name' => $this->driver_name,

            'size' => $this->size . ' ' . $this->unit,
            'status' => $this->status,
        ]);
    }

    public function update()
    {
        $this->validate([
            'lsp_id' => 'required|integer',
            'licence_plate' => 'required|regex:/^[A-Z0-9]{1,2}-\d{4}$/|unique:trucks,licence_plate,' . $this->truck->id,
        ]);

        $this->truck->update([
            'lsp_id' => $this->lsp_id,
            'licence_plate' => $this->licence_plate,
            'driver_name' => $this->driver_name,

            'size' => $this->size . ' ' . $this->unit,
            'status' => $this->status,
        ]);
    }
}

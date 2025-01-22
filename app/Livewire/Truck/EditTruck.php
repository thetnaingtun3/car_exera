<?php

namespace App\Livewire\Truck;

use App\Models\LSP;
use Livewire\Component;
use App\Livewire\Forms\TruckForm;
use App\Models\Truck;

class EditTruck extends Component
{

    public TruckForm $form;
    public $lsps;
    public $lsp_id;

    public function mount(Truck $truck)
    {
        $this->lsps = LSP::all();
        $this->form->setTruck($truck);

        // Set the LSP ID
        $this->lsp_id = $truck->lsp_id;
    }
    public function save()
    {
        // Update the form's LSP ID
        $this->form->lsp_id = $this->lsp_id;

        // Save the form changes
        $this->form->update();

        // Redirect to the customer index route
        return redirect()->route('index.truck');
    }
    public function render()
    {
        return view('livewire.truck.edit-truck');
    }
}

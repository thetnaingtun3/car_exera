<?php

namespace App\Livewire\Truck;

use App\Models\LSP;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\TruckForm;
use Filament\Notifications\Notification;

class CreateTruck extends Component
{

    public $lsps;
    public $lsp_id;
    public TruckForm $form;

    public function mount()
    {


        $this->lsps = LSP::where('status', 'active')->get();
    }
    public function save()
    {
        $this->form->lsp_id = $this->lsp_id;
        $this->form->store();
        Notification::make()
            ->title('Customer Created Successfully')
            ->success()
            ->send();
        return to_route('index.truck');
    }

    #[Title('Create Truck')]
    public function render()
    {
        return view('livewire.truck.create-truck');
    }
}

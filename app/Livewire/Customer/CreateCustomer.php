<?php

namespace App\Livewire\Customer;

use App\Models\LSP;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\CustomerForm;
use Filament\Notifications\Notification;

class CreateCustomer extends Component
{


    public $lsps;
    public $lsp_id;
    public CustomerForm $form;

    public function mount()
    {

        $this->lsps = LSP::where('status', 'active')->get();
    }

    #[Title('Create Customer')]
    public function render()
    {
        return view('livewire.customer.create-customer');
    }

    public function save()
    {
        $this->form->lsp_id = $this->lsp_id;
        $this->form->store();
        Notification::make()
            ->title('Customer Created Successfully')
            ->success()
            ->send();
        return to_route('index.customer');
    }
}

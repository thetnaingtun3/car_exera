<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateCustomer extends Component
{

    public CustomerForm $form;


    #[Title('Create Customer')]
    public function render()
    {
        return view('livewire.customer.create-customer');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Customer Created Successfully')
            ->success()
            ->send();
        return to_route('index.customer');
    }
}

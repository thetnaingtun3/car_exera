<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Livewire\Component;

class EditCustomer extends Component
{
    public CustomerForm $form;

    public function mount(Customer $customer)
    {
        $this->form->setCustomer($customer);
    }

    public function render()
    {
        return view('livewire.customer.create-customer');
    }

    public function save()
    {
        $this->form->update();
        return redirect()->route('index.customer');
    }
}

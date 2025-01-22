<?php

namespace App\Livewire\Customer;

use App\Models\LSP;
use Livewire\Component;
use App\Models\Customer;
use App\Livewire\Forms\CustomerForm;

class EditCustomer extends Component
{
    public CustomerForm $form;
    public $lsps;
    public $lsp_id;

    public function mount(Customer $customer)
    {
        // Load all LSPs
        $this->lsps = LSP::all();

        // Initialize the CustomerForm and set the customer
        $this->form->setCustomer($customer);

        // Set initial LSP ID if applicable
        $this->lsp_id = $customer->lsp_id;
    }



    public function save()
    {
        // Update the form's LSP ID
        $this->form->lsp_id = $this->lsp_id;

        // Save the form changes
        $this->form->update();

        // Redirect to the customer index route
        return redirect()->route('index.customer');
    }
    public function render()
    {
        return view('livewire.customer.create-customer');
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer = null;
    public $customer_name, $customer_code, $lsp_id;


    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        $this->customer_name = $customer->customer_name;
        $this->customer_code = $customer->customer_code;
        $this->lsp_id = $customer->lsp_id;
    }

    public function store()
    {

        $this->validate([
            'customer_code' => 'required|max:11|unique:customers,customer_code',
        ]);
        $this->customer = Customer::create([
            'lsp_id' => $this->lsp_id,
            'customer_name' => $this->customer_name,
            'customer_code' => $this->customer_code,
        ]);
    }

    public function update()
    {
        $this->customer->update([

            'lsp_id' => $this->lsp_id,
            'customer_name' => $this->customer_name,
            'customer_code' => $this->customer_code,
        ]);
    }
}

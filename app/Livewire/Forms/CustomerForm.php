<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer = null;
    public $lsp_name, $customer_name, $customer_code;


    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        $this->lsp_name = $customer->lsp_name;
        $this->customer_name = $customer->customer_name;
        $this->customer_code = $customer->customer_code;

    }

    public function store()
    {

        $this->validate([
            'customer_code' => 'required|max:11|unique:customers,customer_code',
        ]);
        $this->customer = Customer::create([
            'lsp_name' => $this->lsp_name,
            'customer_name' => $this->customer_name,
            'customer_code' => $this->customer_code,
        ]);
    }

    public function update()
    {
        $this->customer->update([
            'lsp_name' => $this->lsp_name,
            'customer_name' => $this->customer_name,
            'customer_code' => $this->customer_code,
        ]);
    }

}

<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer = null;
    public $customer_name, $customer_code, $lsp_id;

    public $status = 'active';



    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        $this->customer_name = $customer->customer_name;
        $this->customer_code = $customer->customer_code;
        $this->lsp_id = $customer->lsp_id;

        $this->status = $customer->status;
    }

    public function store()
    {

        $this->validate([
            'lsp_id' => 'required',
        ]);
        $this->customer = Customer::create([
            'lsp_id' => $this->lsp_id,
            'customer_name' => $this->customer_name,
            'customer_code' => $this->customer_code,
            'status' => $this->status,

        ]);
    }

    public function update()
    {

        $this->customer->update([

            'lsp_id' => $this->lsp_id,
            'customer_name' => $this->customer_name,
            'customer_code' => $this->customer_code,

            'status' => $this->status,
        ]);
    }
}

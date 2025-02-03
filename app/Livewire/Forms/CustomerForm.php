<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer = null;
    public $customer_name, $customer_code, $lsp_id;

    public $status = 'active';

    protected $rules = [
        'form.customer_code' => 'required|digits:9',  // Ensures exactly 9 digits
    ];

    public function updatedFormCustomerCode($value)
    {
        if (strlen($value) > 7) {
            $this->form['customer_code'] = substr($value, 0, 7);
        }
    }

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
            'customer_name' => 'required|string',
            'customer_code' => 'required|regex:/^\d{9}$/|unique:customers,customer_code', // Unique validation for new entries
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
        $this->validate([
            'lsp_id' => 'required',
            'customer_name' => 'required|string',
            'customer_code' => 'required|regex:/^\d{9}$/|unique:customers,customer_code,' . $this->customer->id, // Ignore current customer's code during update
        ]);

        $this->customer->update([
            'lsp_id' => $this->lsp_id,
            'customer_name' => $this->customer_name,
            'customer_code' => $this->customer_code,
            'status' => $this->status,
        ]);
    }
}

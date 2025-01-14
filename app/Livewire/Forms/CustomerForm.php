<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer = null;
    public $name, $address;


    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        $this->name = $customer->name;
        $this->address = $customer->address;
    }

    public function store()
    {
        $this->customer = Customer::create([
            'name' => $this->name,
            'address' => $this->address,
        ]);
    }

    public function update()
    {
        $this->customer->update([
            'name' => $this->name,
            'address' => $this->address,
        ]);
    }

}

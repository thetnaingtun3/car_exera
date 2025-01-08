<?php

namespace App\Livewire\Forms\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Form;

class AdminForm extends Form
{
    public ?Admin $admin = null;
    public $name, $email, $password;
    public $role;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins,email',
        'password' => 'required|string|min:6'
    ];

    public function setAdmin(Admin $admin)
    {
        $this->admin = $admin;
        $this->name = $admin->name;
        $this->email = $admin->email;


        // $this->password = null; // Hide the password value for existing admins
    }

    public function store()
    {
        $this->validate();
        $this->admin = Admin::create([
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => 1,
            'password' => Hash::make($this->password),

        ]);
        $this->admin->assignRole($this->role);

    }
}

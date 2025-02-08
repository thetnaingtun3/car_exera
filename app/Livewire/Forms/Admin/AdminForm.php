<?php

namespace App\Livewire\Forms\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Form;

class AdminForm extends Form
{
    public ?Admin $admin = null;
    public $name, $email, $password;
    public $role;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('admins', 'email')->ignore($this->admin?->id),
            ],
            'password' => $this->admin ? 'nullable|string|min:6' : 'required|string|min:6',
            'role' => 'required|string|exists:roles,name',
        ];
    }
//    protected $rules = [
//        'name' => 'required|string|max:255',
//        'email' => 'required|string|email|max:255|unique:admins,email',
//        'password' => 'required|string|min:6'
//    ];

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

    public function update()
    {
        $this->validate();

        $this->admin->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? Hash::make($this->password) : $this->admin->password,
        ]);

        // Update role
        if ($this->role) {
            $this->admin->syncRoles([$this->role]); // Sync role to ensure only one is assigned
        }
    }
}

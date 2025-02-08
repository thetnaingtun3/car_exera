<?php

namespace App\Livewire\Forms\Admin;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class AdminRoleForm extends Form
{

    public ?Role $role = null;
    public $name;
    protected $rules = [
        'name' => 'require',
    ];

    public function setRole(Role $role)

    {
        $this->role = $role;

    }

    public function store()
    {

        $this->validate();
        Role::create([
            'name' => $this->name,
            'guard_name' => "admin",
        ]);

    }

    public function update()
    {

        $this->validate();
        Role::update([

            'name' => $this->name,
            'guard_name' => "admin",
        ]);

    }
}

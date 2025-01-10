<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminRoleList extends Component

{

    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {

        return view('livewire.admin.admin-role-list');
    }
}

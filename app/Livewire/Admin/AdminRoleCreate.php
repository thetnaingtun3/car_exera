<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\Admin\AdminRoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminRoleCreate extends Component
{

    public $roles;

    public AdminRoleForm $form;

    public function mount()
    {
        $this->roles = Role::all();

    }

    public function save()
    {
        $this->form->store();

        Notification::make()
            ->title('Admin Role created successfully')
            ->success()
            ->send();
        return to_route('admin-role-create');

    }

    public function render()
    {
        return view('livewire.admin.admin-role-create');
    }
}

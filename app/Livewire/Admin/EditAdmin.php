<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\Admin\AdminForm;
use App\Models\Admin;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditAdmin extends Component
{
    public AdminForm $form;

    public $visible = false;
    public $roles;


    public function mount(Admin $admin)
    {

        $this->form->setAdmin($admin);
        $this->roles = Role::all();
        $this->form->role = $admin->roles->first()?->name ?? '';
        $this->visible = false;
    }

    #[Title('Create Admin')]
    public function render()
    {
        return view('livewire.admin.create-admin');
    }

    public function save()
    {
        $this->form->update();
        Notification::make()
            ->title('Admin Edited Successfully')
            ->success()
            ->send();
        return to_route('index.admin');
    }


    public function togglePassword()
    {
        $this->visible = !$this->visible;
    }
}

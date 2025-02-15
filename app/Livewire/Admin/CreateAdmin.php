<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\Admin\AdminForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateAdmin extends Component
{
    public AdminForm $form;

    public $visible = false;
    public $roles;

    public function mount()
    {

        $this->roles = Role::all();
        $this->visible = false;
    }

    #[Title('Create Admin')]
    public function render()
    {

        return view('livewire.admin.create-admin');
    }

    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('Admin Created Successfully')
            ->success()
            ->send();
        return to_route('index.admin');
    }


    public function togglePassword()
    {
        $this->visible = !$this->visible;
    }
}

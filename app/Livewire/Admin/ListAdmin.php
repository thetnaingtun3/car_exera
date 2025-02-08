<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use Filament\Notifications\Notification;
use Livewire\Component;
use Livewire\Features\SupportQueryString\BaseUrl;
use Livewire\WithPagination;

class ListAdmin extends Component
{
    use WithPagination;


    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $status = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Url()]
    public $perPage = 20;

    public function render()
    {
        $status = ($this->status === 'active') ? 'active' : (($this->status === 'inactive') ? 'inactive' : '');
        $admins = Admin::search($this->search)
            ->when($status !== '', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate(20);

        return view('livewire.admin.list-admin', compact('admins'));
    }

    public function delete(Admin $admin)
    {
        $admin->delete();
        Notification::make()
            ->title('Admin deleted successfully')
            ->success()
            ->send();
        return to_route('index.admin');
    }
    // remove this function
    // public function deleteStudent(User $student)


}

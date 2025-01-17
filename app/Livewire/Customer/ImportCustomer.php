<?php

namespace App\Livewire\Customer;

use App\Imports\CustomersImport;
use Livewire\Component;

use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class ImportCustomer extends Component
{
    use WithFileUploads;

    public $file;

    public function save()
    {
        Excel::import(new CustomersImport, $this->file->path());
        $this->reset('file');
        Notification::make()
            ->title('Customer Data Imported Successfully!')
            ->success()
            ->send();

        return redirect()->route('index.customer');
    }

    public function render()
    {
        return view('livewire.customer.import-customer');
    }
}

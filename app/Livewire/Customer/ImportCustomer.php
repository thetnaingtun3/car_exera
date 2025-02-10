<?php

namespace App\Livewire\Customer;

use App\Models\LSP;
use Livewire\Component;

use Livewire\WithFileUploads;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class ImportCustomer extends Component
{
    use WithFileUploads;

    public $file;
    public $lsps;
    public $lsp_id;



    public $importErrors = [];  

    public function save()
    {
        if (!$this->file) {
            Notification::make()
                ->title('No File Selected!')
                ->danger()
                ->send();
            return;
        }
        $import = new CustomersImport($this->lsp_id);
        Excel::import($import, $this->file->path());

        // Excel::import(new CustomersImport($this->lsp_id), $this->file->path());
        // Collect validation errors after import
        $this->importErrors = $import->errors;

        $this->reset('file');

    
        if (empty($this->importErrors)) {
            Notification::make()
                ->title('Customer Data Imported Successfully!')
                ->success()
                ->send();

            return redirect()->route('index.customer');
        }
    }


    // public function save()
    // {

    //     Excel::import(new CustomersImport($this->lsp_id), $this->file->path());
    //     $this->reset('file');
    //     Notification::make()
    //         ->title('Customer Data Imported Successfully!')
    //         ->success()
    //         ->send();

    //     return redirect()->route('index.customer');
    // }
    public function user_excel_download()
    {
        return response()->download(public_path('file/customer_eg.xlsx'));
    }

    public function mount()
    {


        $this->lsps = LSP::where('status', 'active')->get();
    }
    public function render()
    {
        return view('livewire.customer.import-customer');
    }
}

<?php

namespace App\Livewire\Truck;

use App\Models\LSP;
use Livewire\Component;
use App\Imports\TrucksImport;

use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class ImportTruck extends Component
{
    use WithFileUploads;

    public $file;
    public $lsps;
    public $lsp_id;

    public $importErrors = [];  // Store validation errors to display to the user
    public function save()
{

    if (!$this->file) {
        $this->message = 'No File Selected!';
        $this->messageType = 'danger';
        return;
    }

    try {

        $import = new TrucksImport($this->lsp_id);
        Excel::import($import, $this->file);


        $this->importErrors = $import->errors;


        $this->reset('file');


        if (empty($this->importErrors)) {
            $this->message = 'Truck Data Imported Successfully!';
            $this->messageType = 'success';
        } else {

            $this->message = 'Truck Data Import Failed! Please review the errors.';
            $this->messageType = 'danger';
        }

    } catch (\Exception $e) {

        $this->message = 'Error during import: ' . $e->getMessage();
        $this->messageType = 'danger';
    }


    return redirect()->route('index.truck');
}


    public function user_excel_download()
    {
        return response()->download(public_path('file/truck_eg.xlsx'));
    }


    public function mount()
    {

        $this->lsps = LSP::where('status', 'active')->get();
    }

    public function render()
    {
        return view('livewire.truck.import-truck');
    }
}

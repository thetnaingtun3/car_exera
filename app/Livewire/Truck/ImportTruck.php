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

    public function save()
    {
        Excel::import(new TrucksImport($this->lsp_id), $this->file->path());
        $this->reset('file');
        Notification::make()
            ->title('Customer Data Imported Successfully!')
            ->success()
            ->send();

        return redirect()->route('index.truck');
    }
    public function user_excel_download()
    {
        return response()->download(public_path('file/truck_eg.xlsx'));
    }


    public function mount()
    {

        $this->lsps = LSP::all();
    }
    public function render()
    {
        return view('livewire.truck.import-truck');
    }
}

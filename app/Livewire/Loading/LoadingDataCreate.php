<?php

namespace App\Livewire\Loading;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\LoadingDataImport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class LoadingDataCreate extends Component
{

    use WithFileUploads;

    public $file;

    public function save()
    {

        if (!$this->file) {
            $this->message = 'No File Selected!';
            $this->messageType = 'danger';
            return;
        }
        try {
            Excel::import(new LoadingDataImport(), $this->file->path());


            $this->reset('file');
            Notification::make()
                ->title('Loading Data Imported Successfully!')
                ->success()
                ->send();

            return redirect()->route('loading.data');
        } catch (\Exception $e) {

            $this->message = 'Error during import: ' . $e->getMessage();
            $this->messageType = 'danger';
        }
    }


    public function user_excel_download()
    {
        return response()->download(public_path('file/loading.xlsx'));
    }

    public function render()
    {
        return view('livewire.loading.loading-data-create');
    }
}

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

        Excel::import(new LoadingDataImport(), $this->file->path());
        $this->reset('file');
        Notification::make()
            ->title('Loading Data Imported Successfully!')
            ->success()
            ->send();

        return redirect()->route('loading.data');
    }
    public function user_excel_download()
    {
        return response()->download(public_path('file/lsp_eg.xlsx'));
    }

    public function render()
    {
        return view('livewire.loading.loading-data-create');
    }
}

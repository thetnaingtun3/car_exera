<?php

namespace App\Livewire\LSP;

use Livewire\Component;
use App\Imports\LspImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class LSPImports extends Component
{
    use WithFileUploads;

    public $file;
    public $lsps;
    public $lsp_id;

    public function save()
    {
        if (!$this->file) {
            $this->message = 'No File Selected!';
            $this->messageType = 'danger';
            return;
        }

        try {
            // Store the file temporarily and retrieve its real path
            $filePath = $this->file->store('temp');

            Excel::import(new LspImport(), $this->file->getRealPath());
            $this->reset('file');

            $this->message = 'Customer Data Imported Successfully!';
            $this->messageType = 'success';
        } catch (\Exception $e) {
            $this->message = 'Import Error: ' . $e->getMessage();
            $this->messageType = 'danger';
        }

        return redirect()->route('index.lsp');
    }
    public function user_excel_download()
    {
        return response()->download(public_path('file/lsp_eg.xlsx'));
    }
    public function render()
    {
        return view('livewire.l-s-p.import-l-s-p');
    }
}

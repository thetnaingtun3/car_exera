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

        Excel::import(new LspImport(), $this->file->path());
        $this->reset('file');
        Notification::make()
            ->title('Customer Data Imported Successfully!')
            ->success()
            ->send();

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

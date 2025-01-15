<?php

namespace App\Livewire\LSP;

use App\Livewire\Forms\LspForm;
use Filament\Notifications\Notification;
use Livewire\Attributes\Title;
use Livewire\Component;

class LSPCreate extends Component
{

    public LspForm $form;

    #[Title('Create LSP')]

    public function render()
    {
        return view('livewire.l-s-p.l-s-p-create');
    }
    public function save()
    {
        $this->form->store();
        Notification::make()
            ->title('LSP Created Successfully')
            ->success()
            ->send();
        return to_route('index.lsp');
    }
}

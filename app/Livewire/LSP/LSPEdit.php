<?php

namespace App\Livewire\LSP;

use App\Livewire\Forms\LspForm;
use App\Models\LSP;
use Livewire\Attributes\Title;
use Livewire\Component;

class LSPEdit extends Component
{

    public LspForm $form;

    public function mount(LSP $lsp)
    {
        $this->form->setCustomer($lsp);
    }

    #[Title('Edit LSP')]


    public function render()
    {

        return view('livewire.l-s-p.l-s-p-create');
    }
    public function save()
    {
        $this->form->update();
        return redirect()->route('index.lsp');
    }
}

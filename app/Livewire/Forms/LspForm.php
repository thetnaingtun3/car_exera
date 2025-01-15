<?php

namespace App\Livewire\Forms;

use App\Models\LSP;
use Livewire\Form;

class LspForm extends Form
{
    public ?LSP $lsp = null;
    public $lsp_name;


    public function setCustomer(LSP $lsp)
    {
        $this->lsp = $lsp;
        $this->lsp_name = $lsp->lsp_name;
    }

    public function store()
    {
        $this->lsp = LSP::create([
            'lsp_name' => $this->lsp_name,
        ]);
    }

    public function update()
    {
        $this->lsp->update([
            'lsp_name' => $this->lsp_name,
        ]);
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\LSP;
use Livewire\Form;

class LspForm extends Form
{
    public ?LSP $lsp = null;
    public $lsp_name;
    public $status = 'active';


    public function setCustomer(LSP $lsp)
    {
        $this->lsp = $lsp;
        $this->lsp_name = $lsp->lsp_name;
        $this->status = $lsp->status;
    }

    public function store()
    {
        $this->lsp = LSP::create([
            'lsp_name' => $this->lsp_name,
            'status' => $this->status,
        ]);
    }

    public function update()
    {
        $this->lsp->update([
            'lsp_name' => $this->lsp_name,
            'status' => $this->status,
        ]);
    }
}

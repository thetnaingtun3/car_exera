<?php

namespace App\Livewire\LSP;

use App\Models\LSP;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class LSPList extends Component
{

    use WithPagination;


    public $count = 0;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Url()]
    public $perPage = 20;

    public function mount()
    {
        $this->count = LSP::count();
    }
    #[Title('Customer List')]
    public function render()
    {
        $lsps = LSP::search($this->search)
            ->paginate(20);


        return view('livewire.l-s-p.l-s-p-list', compact('lsps'));
    }
}

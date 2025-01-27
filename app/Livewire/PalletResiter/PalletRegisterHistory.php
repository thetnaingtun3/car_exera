<?php

namespace App\Livewire\PalletResiter;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\PalletRegister;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PalletRegistrationExport;

class PalletRegisterHistory extends Component
{
    use WithPagination;
    public $count = 0;
    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $startDate = '';

    #[Url(history: true)]
    public $endDate = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 20;

    protected $queryString = ['search', 'startDate', 'endDate', 'sortBy', 'sortDir', 'perPage'];
    public function exportData()
    {
        return Excel::download(new PalletRegistrationExport, 'data.xlsx');
    }
    // total data count
    public function mount()
    {
        $this->count = PalletRegister::count();
    }
    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }
    public function applyDateFilter()
    {
        // The Livewire view will automatically update because these properties are reactive.
    }
    #[Title('Pallet Register History')]

    public function render()
    {

        $query = PalletRegister::search($this->search);

        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }
        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        $pallets = $query
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.pallet-resiter.pallet-register-history', compact('pallets'));
    }
}

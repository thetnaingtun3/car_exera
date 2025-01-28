<?php

namespace App\Livewire\CarRegister;

use App\Models\LSP;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\CarRegistration;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CarRegistrationExport;


class CarRegisterHistory extends Component
{
    use WithPagination;
    public $lsps;
    public $count = 0;

    #[Url(history: true)]
    public $selectedLsp = ''; // Stores the selected LSP ID

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

    // protected $queryString = ['search', 'startDate', 'endDate', 'sortBy', 'sortDir', 'perPage'];
    protected $queryString = ['search', 'startDate', 'endDate', 'sortBy', 'sortDir', 'perPage', 'selectedLsp'];


    // total data count
    public function mount()
    {
        $this->lsps = LSP::all();
        $this->count = CarRegistration::count();
    }

    public function exportData()
    {
        return Excel::download(new CarRegistrationExport, 'data.xlsx');
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

    #[Title('Car Register History')]
    public function render()
    {
        $query = CarRegistration::search($this->search)
            ->with(['lsp', 'customer', 'truck']);

        // Apply date filters if set
        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }
        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        // Apply LSP filter if selected
        if (!empty($this->selectedLsp)) {
            $query->where('lsp_id', $this->selectedLsp);
        }

        $registrations = $query
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.car-register.car-register-history', compact('registrations'));
    }
}

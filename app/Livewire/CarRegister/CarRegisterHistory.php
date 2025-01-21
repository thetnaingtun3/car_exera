<?php

namespace App\Livewire\CarRegister;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use App\Models\CarRegistration;

class CarRegisterHistory extends Component
{
    use WithPagination;

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

        $registrations = $query
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.car-register.car-register-history', compact('registrations'));
    }
}

<?php

namespace App\Livewire\CarRegister;

use App\Models\CarRegistration;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CarRegisterQrCodeHistory extends Component
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

    // total data count
    public function mount()
    {
        $this->count = CarRegistration::count();
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

    #[Title('Car Register Qr Code History')]
    public function render()
    {
        $query = CarRegistration::search($this->search)
            ->with(['lsp', 'customer', 'truck']);

        // Apply date filters if set
        if (!empty($this->startDate)) {
            $query->whereDate('click_date', '>=', $this->startDate);
        }
        if (!empty($this->endDate)) {
            $query->whereDate('click_date', '<=', $this->endDate);
        }

        $registrations = $query
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.car-register.car-register-qr-code-history', compact('registrations'));
    }
}

<?php

namespace App\Livewire\CarRegister;

use App\Models\LSP;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\CarRegistration;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CarRegistrationExport;
use Filament\Notifications\Notification;


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
    public $perPage = 70;
    #[Url(history: true)]
    public $selectedCustomer = ''; // Stores the selected Customer ID

    public $customers = []; // Holds the available customers based on LSP selection

    // protected $queryString = ['search', 'startDate', 'endDate', 'sortBy', 'sortDir', 'perPage'];
    protected $queryString = ['search', 'startDate', 'endDate', 'sortBy', 'sortDir', 'perPage', 'selectedLsp'];


    // total data count
    public function mount()
    {

        $this->lsps = LSP::where('status', 'active')->get();
        $this->customers = collect(); // Start empty
        $this->count = CarRegistration::count();
    }

    public function updatedSelectedLsp()
    {
        if (!empty($this->selectedLsp)) {
            $this->customers = Customer::where('lsp_id', $this->selectedLsp)->where('status', 'active')->get();
        } else {
            $this->customers = collect(); // Reset customers when no LSP is selected
        }
        $this->selectedCustomer = ''; // Reset customer selection when LSP changes
    }

    public function resetFilters()
    {
        $this->reset(['selectedLsp', 'selectedCustomer', 'startDate', 'endDate', 'search']);
        $this->customers = collect(); // Reset customer list
    }

    public function exportData()
    {
        // Ensure user selects a valid date range
        if (empty($this->startDate) || empty($this->endDate)) {
            Notification::make()
                ->title('Please select a valid date range.')
                ->danger()
                ->send();
            return;
        }

        // Ensure the date range is exactly 14 days or less
        if (now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate)) > 30) {
            Notification::make()
                ->title('Date range cannot exceed 30 days.')
                ->danger()
                ->send();
            return;
        }

        return Excel::download(new CarRegistrationExport($this->startDate, $this->endDate), 'car_registration.xlsx');
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

        // Apply Customer filter if selected
        if (!empty($this->selectedCustomer)) {
            $query->where('customer_id', $this->selectedCustomer);
        }

        $registrations = $query
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.car-register.car-register-history', compact('registrations'));
    }
}

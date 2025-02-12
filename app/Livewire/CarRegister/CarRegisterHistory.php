<?php

namespace App\Livewire\CarRegister;

use App\Models\LSP;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;
use App\Models\CarRegistration;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;
use App\Exports\CarRegistrationExport;

class CarRegisterHistory extends Component
{
    use WithPagination;

    public $count;
    public $selectedCars = [];
    public $selectAll = false;
    public $lsps;
    public $customers = [];

    public $rangeStart;
    public $rangeEnd;

    public $dynamic = 1;

    public $search = '';
    public $startDate = '';
    public $endDate = '';
    public $selectedLsp = '';
    public $selectedCustomer = '';
    public $sortBy = 'id';
    public $sortDir = 'DESC';
    public $perPage = 100;

    protected $queryString = [
        'search',
        'startDate',
        'endDate',
        'selectedLsp',
        'selectedCustomer',
        'sortBy',
        'sortDir',
        'perPage'
    ];

    public function mount()
    {
        $this->lsps = LSP::where('status', 'active')->get();
        $this->count = CarRegistration::count();
    }

    public function updatedSelectedLsp()
    {
        if (!empty($this->selectedLsp)) {
            $this->customers = Customer::where('lsp_id', $this->selectedLsp)->where('status', 'active')->get();
        } else {
            $this->customers = collect();
        }
        $this->selectedCustomer = '';
    }

    public function resetFilters()
    {
        $this->reset([
            'selectedLsp', 'selectedCustomer', 'startDate', 'endDate', 'search', 'rangeStart', 'rangeEnd'
        ]);
        $this->customers = collect();
    }

    public function selectRangeByDynamic()
    {
        $this->selectedCars = [];

        $cars = $this->getCarsQuery()->paginate($this->perPage);

        foreach ($cars as $index => $car) {
            if ($index + 1 >= $this->rangeStart && ($index + 1) <= $this->rangeEnd) {
                $this->selectedCars[] = $car->id;
            }
        }
    }

    public function allCheck()
    {
        $this->selectedCars = CarRegistration::pluck('id')->toArray();
        $this->selectAll = true;
    }

    public function removeCheck()
    {
        $this->selectedCars = [];
        $this->selectAll = false;
    }

    public function exportData()
    {
        if (empty($this->startDate) || empty($this->endDate)) {
            Notification::make()
                ->title('Please select a valid date range.')
                ->danger()
                ->send();
            return;
        }

        if (now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate)) > 31) {
            Notification::make()
                ->title('Date range cannot exceed 31 days.')
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

    public function getCarsQuery()
    {
        $query = CarRegistration::search($this->search)->with(['lsp', 'customer', 'truck']);

        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        if (!empty($this->selectedLsp)) {
            $query->where('lsp_id', $this->selectedLsp);
        }

        if (!empty($this->selectedCustomer)) {
            $query->where('customer_id', $this->selectedCustomer);
        }

        return $query->orderBy($this->sortBy, $this->sortDir);
    }

    public function render()
    {
        $registrations = $this->getCarsQuery()->paginate($this->perPage);
        $this->count = $registrations->total();

        return view('livewire.car-register.car-register-history', compact('registrations'));
    }

    public function getPrintUrl()
    {
        if (empty($this->selectedCars)) {
            Notification::make()
                ->title('No  selected for printing.')
                ->danger()
                ->send();
            return;
        }
        $carIds = implode(',', $this->selectedCars);

        return redirect()->route('car.print.qr', ['ids' => $carIds]);

    }
}

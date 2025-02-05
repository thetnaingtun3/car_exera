<?php

namespace App\Livewire\Truck;

use App\Models\Truck;
use App\Models\LSP;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Exports\TruckDataExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class ListTruck extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $selectedLsp = ''; // Stores selected LSP ID

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 20;

    #[Url(history: true)]
    public $startDate = '';

    #[Url(history: true)]
    public $endDate = '';

    public $lsps; // List of all LSPs
    public $count;

    public function mount()
    {

        // $this->count = Truck::count();

        $this->lsps =  LSP::where('status', 'active')->get();
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
        //        if (!empty($this->startDate) && !empty($this->endDate)) {
        //            $diff = now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate));
        //            if ($diff > 14) {
        //                Notification::make()
        //                    ->title('Date range cannot exceed 14 days.')
        //                    ->danger()
        //                    ->send();
        //                return;
        //            }
        //        }
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->selectedLsp = '';
        $this->startDate = '';
        $this->endDate = '';
    }

    public function exportData()
    {
        // Ensure user selects a valid date range
        //        if (empty($this->startDate) || empty($this->endDate)) {
        //            Notification::make()
        //                ->title('Please select a valid date range.')
        //                ->danger()
        //                ->send();
        //            return;
        //        }
        //
        //        // Ensure the date range is exactly 14 days or less
        //        if (now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate)) > 14) {
        //            Notification::make()
        //                ->title('Date range cannot exceed 14 days.')
        //                ->danger()
        //                ->send();
        //            return;
        //        }

        //        return Excel::download(new TruckDataExport($this->startDate, $this->endDate), 'truck_data.xlsx');
        return Excel::download(new TruckDataExport(), 'truck_data.xlsx');
    }


    #[Title('Truck List')]
    public function render()
    {
        $query = Truck::search($this->search)
            ->with("lsp")
            ->when(!empty($this->selectedLsp), function ($query) {
                $query->where('lsp_id', $this->selectedLsp);
            })
            ->when(!empty($this->startDate), function ($query) {
                $query->whereDate('created_at', '>=', $this->startDate);
            })
            ->when(!empty($this->endDate), function ($query) {
                $query->whereDate('created_at', '<=', $this->endDate);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        $this->count = $query->total();

        return view('livewire.truck.list-truck', compact('query'));
    }
}

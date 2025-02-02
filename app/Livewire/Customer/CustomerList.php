<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\LSP;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use App\Exports\CustomerDataExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class CustomerList extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $selectedLsp = '';

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

    public $lsps;
    public $count = 0;

    public function mount()
    {

        $this->lsps =  LSP::where('status', 'active')->get();
        $this->count = Customer::count();
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
        $this->startDate = '';
        $this->endDate = '';
        $this->search = '';
        $this->selectedLsp = '';
    }

    public function exportData()
    {
//        if (empty($this->startDate) || empty($this->endDate)) {
//            Notification::make()
//                ->title('Please select a valid date range.')
//                ->danger()
//                ->send();
//            return;
//        }
//
//        $diff = now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate));
//        if ($diff > 14) {
//            Notification::make()
//                ->title('Date range cannot exceed 14 days.')
//                ->danger()
//                ->send();
//            return;
//        }

        return Excel::download(new CustomerDataExport(), 'customer_data.xlsx');
//        return Excel::download(new CustomerDataExport($this->startDate, $this->endDate), 'customer_data.xlsx');
    }

    #[Title('Customer List')]
    public function render()
    {
        $query = Customer::search($this->search)
            ->with("lsp");

        if (!empty($this->selectedLsp)) {
            $query->where('lsp_id', $this->selectedLsp);
        }

        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }
        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        $customers = $query
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.customer.customer-list', compact('customers'));
    }
}

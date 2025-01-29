<?php

namespace App\Livewire\PalletResiter;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\PalletRegister;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;
use App\Exports\PalletRegistrationExport;

class PalletRegisterHistory extends Component
{
    use WithPagination;

    public $count;
    public $selectedPallets = []; // Selected checkbox IDs
    public $selectAll = false;    // Select All checkbox

    #[Url(history: true)] public $search = '';
    #[Url(history: true)] public $startDate = '';
    #[Url(history: true)] public $endDate = '';
    #[Url(history: true)] public $startPalletNumber = ''; // Start pallet filter
    #[Url(history: true)] public $endPalletNumber = '';   // End pallet filter
    #[Url(history: true)] public $selectedProductType = ''; // Product Type filter
    #[Url(history: true)] public $selectedProductionLine = ''; // Production Line filter
    #[Url(history: true)] public $selectedVolume = ''; // Volume filter
    #[Url(history: true)] public $sortBy = 'created_at';
    #[Url(history: true)] public $sortDir = 'DESC';
    #[Url()] public $perPage = 100;

    protected $queryString = ['search', 'startDate', 'endDate', 'startPalletNumber', 'endPalletNumber', 'selectedProductType', 'selectedProductionLine', 'selectedVolume', 'sortBy', 'sortDir', 'perPage'];

    // Reset filters to default state
    public function resetFilters()
    {
        $this->reset(['startPalletNumber', 'endPalletNumber', 'search', 'startDate', 'endDate', 'selectedProductType', 'selectedProductionLine', 'selectedVolume']);
    }

    public function mount()
    {
        $this->count = PalletRegister::count();
    }
    // Export pallet data as Excel file
    public function exportData()
    {
        // Validate that user-selected date range does not exceed 14 days
        if (now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate)) > 14) {
            Notification::make()
                ->title('Date range cannot exceed 14 days.')
                ->danger()
                ->send();

            return;
        }

        return Excel::download(new PalletRegistrationExport($this->startDate, $this->endDate), 'filtered_data.xlsx');
    }


    // Select all checkboxes
    public function allCheck()
    {
        $this->selectedPallets = PalletRegister::pluck('id')->toArray();
        $this->selectAll = true;
    }

    // Deselect all checkboxes
    public function removeCheck()
    {
        $this->selectedPallets = [];
        $this->selectAll = false;
    }

    // Apply pallet number filters correctly
    public function applyFilters()
    {
        $this->render();
    }
    public function printQRCodesPage(Request $request)
    {
        $palletIds = explode(',', $request->query('ids'));
        $selectedPallets = PalletRegister::whereIn('id', $palletIds)->get();

        return view('livewire.pallet-resiter.print-qr-codes', compact('selectedPallets'));
    }

    public function printSelectedQRCodes()
    {
        if (empty($this->selectedPallets)) {
            Notification::make()
                ->title('No pallets selected for printing.')
                ->danger()
                ->send();
            return;
        }

        // Emit event to open print page
        $this->dispatch('openPrintPage', $this->selectedPallets);
    }



    #[Title('Pallet Register History')]
    public function render()
    {
        $query = PalletRegister::query();

        // Search Filter
        if (!empty($this->search)) {
            $query->where('pallet_number', 'like', "%{$this->search}%");
        }

        // Date Filters
        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }
        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        // Pallet Number Range Filter (Extract numeric part correctly)
        if (!empty($this->startPalletNumber) && !empty($this->endPalletNumber)) {
            $query->whereRaw("CAST(SUBSTRING_INDEX(pallet_number, '-', -1) AS UNSIGNED) BETWEEN ? AND ?", [
                (int) $this->startPalletNumber,
                (int) $this->endPalletNumber
            ]);
        }

        // Product Type Filter
        if (!empty($this->selectedProductType)) {
            $query->where('product_type', $this->selectedProductType);
        }

        // Production Line Filter
        if (!empty($this->selectedProductionLine)) {
            $query->where('production_line', $this->selectedProductionLine);
        }

        // Volume Filter
        if (!empty($this->selectedVolume)) {
            $query->where('volume', $this->selectedVolume);
        }

        // ✅ Order By Numeric Part of Pallet Number
        $query->orderByRaw("CAST(SUBSTRING_INDEX(pallet_number, '-', -1) AS UNSIGNED) ASC");

        $pallets = $query->paginate($this->perPage);

        // Get distinct values for dropdown filters
        $productTypes = PalletRegister::distinct()->pluck('product_type');
        $productionLines = PalletRegister::distinct()->pluck('production_line');
        $volumes = PalletRegister::distinct()->pluck('volume');

        return view('livewire.pallet-resiter.pallet-register-history', compact('pallets', 'productTypes', 'productionLines', 'volumes'));
    }
}

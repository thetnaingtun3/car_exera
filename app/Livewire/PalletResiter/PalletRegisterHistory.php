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
    public $selectedPallets = [];
    public $selectAll = false;

    #[Url(history: true)] public $search = '';
    #[Url(history: true)] public $startDate = '';
    #[Url(history: true)] public $endDate = '';
    #[Url(history: true)] public $startPalletNumber = '';
    #[Url(history: true)] public $endPalletNumber = '';
    #[Url(history: true)] public $selectedProductType = '';
    #[Url(history: true)] public $selectedProductionLine = '';
    #[Url(history: true)] public $selectedVolume = '';
    #[Url(history: true)] public $sortBy = 'created_at';
    #[Url(history: true)] public $sortDir = 'DESC';
    #[Url()] public $perPage = 100;

    protected $queryString = [
        'search',
        'startDate',
        'endDate',
        'startPalletNumber',
        'endPalletNumber',
        'selectedProductType',
        'selectedProductionLine',
        'selectedVolume',
        'sortBy',
        'sortDir',
        'perPage'
    ];

    public function mount()
    {
        $this->count = PalletRegister::count();
    }

    public function resetFilters()
    {
        $this->reset([
            'startPalletNumber',
            'endPalletNumber',
            'search',
            'startDate',
            'endDate',
            'selectedProductType',
            'selectedProductionLine',
            'selectedVolume'
        ]);
    }

    public function exportData()
    {

        if (empty($this->startDate) || empty($this->endDate)) {
            Notification::make()
                ->title('Please select a date range to export data.')
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

        return Excel::download(new PalletRegistrationExport($this->startDate, $this->endDate), 'filtered_data.xlsx');
    }

    public function allCheck()
    {
        $this->selectedPallets = PalletRegister::pluck('id')->toArray();
        $this->selectAll = true;
    }

    public function removeCheck()
    {
        $this->selectedPallets = [];
        $this->selectAll = false;
    }

    public function applyFilters()
    {
        $this->render();
    }

    // Generate and emit the print URL to the frontend
    public function getPrintUrl()
    {
        if (empty($this->selectedPallets)) {
            Notification::make()
                ->title('No pallets selected for printing.')
                ->danger()
                ->send();
            return;
        }

        // Return the full URL for the QR code print page
        $url = route('pallet.print.qr') . '?ids=' . implode(',', $this->selectedPallets);
        $this->dispatch('receivePrintUrl', $url);  // Send the URL to the frontend
    }

    #[Title('Pallet Register History')]
    public function render()
    {
        $query = PalletRegister::query();

        if (!empty($this->search)) {
            $query->where('pallet_number', 'like', "%{$this->search}%");
        }

        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        if (!empty($this->startPalletNumber) && !empty($this->endPalletNumber)) {
            $query->whereRaw("CAST(SUBSTRING_INDEX(pallet_number, '-', -1) AS UNSIGNED) BETWEEN ? AND ?", [
                (int) $this->startPalletNumber,
                (int) $this->endPalletNumber
            ]);
        }

        if (!empty($this->selectedProductType)) {
            $query->where('product_type', $this->selectedProductType);
        }

        if (!empty($this->selectedProductionLine)) {
            $query->where('production_line', $this->selectedProductionLine);
        }

        if (!empty($this->selectedVolume)) {
            $query->where('volume', $this->selectedVolume);
        }

        $query->orderByRaw("CAST(SUBSTRING_INDEX(pallet_number, '-', -1) AS UNSIGNED) ASC");

        $pallets = $query->paginate($this->perPage);

        $productTypes = PalletRegister::distinct()->pluck('product_type');
        $productionLines = PalletRegister::distinct()->pluck('production_line');
        $volumes = PalletRegister::distinct()->pluck('volume');

        return view('livewire.pallet-resiter.pallet-register-history', compact('pallets', 'productTypes', 'productionLines', 'volumes'));
    }
}

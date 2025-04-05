<?php

namespace App\Livewire\Loading;

use Livewire\Component;
use App\Models\LoadingData;
use Livewire\WithPagination;
use App\Models\PalletRegister;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LoadingDataExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;
use App\Exports\PalletRegistrationExport;

class LoadingDataList extends Component
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
    #[Url(history: true)] public $selectedTruckNumber = ''; // Truck Number filter

    #[Url(history: true)] public $selectedVolume = ''; // Volume filter
    #[Url(history: true)] public $sortBy = 'id';
    #[Url(history: true)] public $sortDir = 'DESC';
    #[Url()] public $perPage = 500;

    protected $queryString = ['search', 'startDate', 'endDate', 'startPalletNumber', 'endPalletNumber', 'selectedProductType', 'selectedProductionLine', 'selectedTruckNumber', 'selectedVolume', 'sortBy', 'sortDir', 'perPage'];

    // Reset filters to default state
    public function resetFilters()
    {
        $this->reset(['startPalletNumber', 'endPalletNumber', 'search', 'startDate', 'endDate', 'selectedProductType', 'selectedProductionLine', 'selectedTruckNumber', 'selectedVolume']);
    }

    // public function mount()
    // {
    //     $this->count = LoadingData::count();
    // }

    public function exportData()
    {

        if (empty($this->startDate) || empty($this->endDate)) {
            Notification::make()
                ->title('Please select a date range to export data.')
                ->danger()
                ->send();
            return;
        }


        // Validate that user-selected date range does not exceed 14 days
        if (now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate)) > 31) {
            Notification::make()
                ->title('Date range cannot exceed 31 days.')
                ->danger()
                ->send();

            return;
        }

        return Excel::download(new LoadingDataExport($this->startDate, $this->endDate), 'filtered_data.xlsx');
    }


    public function exportToPDF()
    {
        // Fetch filtered data
        $loadingData = LoadingData::when(!empty($this->startDate), function ($query) {
            return $query->whereDate('created_at', '>=', $this->startDate);
        })
            ->when(!empty($this->endDate), function ($query) {
                return $query->whereDate('created_at', '<=', $this->endDate);
            })
            ->when(!empty($this->search), function ($query) {
                return $query->where('pallet_number', 'like', "%{$this->search}%");
            })
            ->get();

        // Generate PDF with better formatting
        $pdf = Pdf::loadView('exports.loading-data-pdf', compact('loadingData'))
            ->setPaper('a4', 'landscape') // 🛠 Fix: Use A4 landscape for better fitting
            ->setOptions([
                'defaultFont' => 'Arial',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]);

        // Return PDF for direct download
        return response()->streamDownload(fn() => print($pdf->stream()), 'loading_data.pdf');
    }

    public function render()
    {
        $query = LoadingData::query();

        // Search Filter
        if (!empty($this->search)) {
            $query->search($this->search);
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
                (int)$this->startPalletNumber,
                (int)$this->endPalletNumber
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
        if (!empty($this->selectedTruckNumber)) {
            $query->where('truck_number', $this->selectedTruckNumber);
        }

        // Volume Filter
        if (!empty($this->selectedVolume)) {
            $query->where('volume', $this->selectedVolume);
        }

        // ✅ Order By Numeric Part of Pallet Number
        // $query->orderByRaw("CAST(SUBSTRING_INDEX(pallet_number, '-', -1) AS UNSIGNED) ASC");

        // ✅ Ensure sorting by ID DESC by default
        //        $pallets = $query->orderBy('id', 'DESC')->paginate($this->perPage);
        $isFiltered = !empty($this->search)
            || !empty($this->startDate)
            || !empty($this->endDate)
            || (!empty($this->startPalletNumber) && !empty($this->endPalletNumber))
            || !empty($this->selectedProductType)
            || !empty($this->selectedProductType)
            || !empty($this->selectedTruckNumber)
            || !empty($this->selectedVolume);
        if ($isFiltered) {
            $pallets = $query->orderBy('id', 'DESC')->get(); // Remove pagination
        } else {
            $pallets = $query->orderBy('id', 'DESC')->paginate($this->perPage);
        }

        $this->count = $pallets instanceof \Illuminate\Pagination\LengthAwarePaginator ? $pallets->total() : $pallets->count();

        // Exclude NULL and empty values for dropdown filters
        $productTypes = LoadingData::whereNotNull('product_type')->where('product_type', '!=', 'null')->distinct()->pluck('product_type');
        $productionLines = LoadingData::whereNotNull('production_line')->where('production_line', '!=', 'null')->distinct()->pluck('production_line');
        $volumes = LoadingData::whereNotNull('volume')->where('volume', '!=', 'null')->distinct()->pluck('volume');
        $car_numbers = LoadingData::whereNotNull('truck_number')
            ->where('truck_number', '!=', 'null')
            ->distinct()
            ->groupBy('truck_number')
            ->pluck('truck_number');

        return view('livewire.loading.loading-data-list', compact('pallets', 'productTypes', 'productionLines', 'volumes', 'car_numbers'));
    }
}

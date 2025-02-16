<?php


namespace App\Livewire\Line;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PalletRegister;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;
use App\Exports\PalletRegistrationExport;

class ChangBottlingLineCarton extends Component
{
    use WithPagination;

    public $count;
    public $selectedPallets = [];
    public $selectAll = false;

    public $rangeStart;
    public $rangeEnd;
    public $dynamic = 1;

    public $search = '';
    public $startDate = '';
    public $endDate = '';
    public $startPalletNumber = '';
    public $endPalletNumber = '';
    public $selectedProductType = '';
    public $selectedProductionLine = '';
    public $selectedVolume = '';
    public $sortBy = 'id';

    public $sortDir = 'DESC';
    public $perPage = 100;

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
    // public function applyFilters()
    // {
    //     $this->render();
    // }

    public function selectRangeByDynamic()
    {
        // Reset the selected pallets
        $this->selectedPallets = [];

        // Get the current page of pallets in the correct order (sorted view)
        $pallets = $this->getPalletsQuery()->paginate($this->perPage);

        // Iterate over the displayed rows and select based on the visual order
        foreach ($pallets as $index => $user) {
            // Check if the row index falls within the selected range
            if (($index + 1) >= $this->rangeStart && ($index + 1) <= $this->rangeEnd) {
                $this->selectedPallets[] = $user->id;
            }
        }
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

        if ($this->selectedVolume == '') {
            return Excel::download(new PalletRegistrationExport(
                $this->startDate,
                $this->endDate,
                'Chang beer',
                ['Bottling line Carton', 'Bottling line Crate']
            ), 'BottlinglineCartonCrate.xlsx');
        }

// If a specific volume is selected
        return Excel::download(new PalletRegistrationExport(
            $this->startDate,
            $this->endDate,
            'Chang beer',
            'Bottling line ' . $this->selectedVolume
        ), 'BottlinglineCarton.xlsx');
    }

    public
    function allCheck()
    {
        $this->selectedPallets = PalletRegister::pluck('id')->toArray();
        $this->selectAll = true;
    }

    public
    function removeCheck()
    {
        $this->selectedPallets = [];
        $this->selectAll = false;
    }

    public
    function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = $this->sortDir === 'ASC' ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }


    public
    function getPalletsQuery()
    {
        $query = PalletRegister::query()->whereIn('production_line', ['Bottling line Carton', 'Bottling line Crate']);


        // Apply search filter using the model's search scope
        if (!empty($this->search)) {
            $query->search($this->search);
        }

        // Apply date filters
        if (!empty($this->startDate) || !empty($this->endDate)) {
            $query->filterByDate($this->startDate, $this->endDate);
        }

        // Apply pallet number range filter
        if (!empty($this->startPalletNumber) && !empty($this->endPalletNumber)) {
            $query->whereRaw("CAST(SUBSTRING_INDEX(pallet_number, '-', -1) AS UNSIGNED) BETWEEN ? AND ?", [
                (int)$this->startPalletNumber,
                (int)$this->endPalletNumber
            ]);
        }

        // Apply product type filter
        if (!empty($this->selectedProductType)) {
            $query->where('product_type', $this->selectedProductType);
        }

        // Apply production line filter
        if (!empty($this->selectedProductionLine)) {
            $query->where('production_line', $this->selectedProductionLine);
        }

        // Apply volume filter
        if (!empty($this->selectedVolume)) {
            $query->where('unit', $this->selectedVolume);
        }

        return $query->orderBy($this->sortBy, $this->sortDir);
    }


    public
    function render()
    {
        $pallets = $this->getPalletsQuery()->paginate($this->perPage);

        $productTypes = PalletRegister::distinct()->pluck('product_type');
        $productionLines = PalletRegister::distinct()->pluck('production_line');

        $units = PalletRegister::distinct()
            ->where('product_type', 'Chang beer')
            ->whereIn('production_line', ['Bottling line Carton', 'Bottling line Crate'])
            ->pluck('unit');
        $this->count = $pallets->total();

        return view('livewire.line.chang-bottling-line-carton', compact('pallets', 'productTypes', 'productionLines', 'units'));

    }

    public
    function getPrintUrl()
    {
        if (empty($this->selectedPallets)) {
            Notification::make()
                ->title('No pallets selected for printing.')
                ->danger()
                ->send();
            return;
        }

        $palletIds = implode(',', $this->selectedPallets);
        return redirect()->route('pallet.print.qr', ['ids' => $palletIds]);
    }

    public
    function getChangeDateUrl()
    {
        if (empty($this->selectedPallets)) {
            Notification::make()
                ->title('No  selected for printing.')
                ->danger()
                ->send();
            return;
        }
        $Ids = implode(',', $this->selectedPallets);

        return redirect()->route('pallet.qrcode.date.change', ['ids' => $Ids]);
    }

    public
    function deletePallet($id)
    {
        $pallet = PalletRegister::find($id);
        $pallet->delete();
        $this->render();
    }
}

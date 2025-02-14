<?php

namespace App\Livewire\PalletResiter;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PalletRegister;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;
use App\Exports\PalletRegistrationExport;

class PalletRegisterHistory extends Component
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

<<<<<<< HEAD
=======
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

>>>>>>> a82a91c (Your commit message)
    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = $this->sortDir === 'ASC' ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }
    public function getPalletsQuery()
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
                (int)$this->startPalletNumber,
                (int)$this->endPalletNumber
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

        return $query->orderBy($this->sortBy, $this->sortDir);
    }


    public function render()
    {
        $pallets = $this->getPalletsQuery()->paginate($this->perPage);

        $productTypes = PalletRegister::distinct()->pluck('product_type');
        $productionLines = PalletRegister::distinct()->pluck('production_line');
        $volumes = PalletRegister::distinct()->pluck('volume');

        $this->count = $pallets->total();

        return view('livewire.pallet-resiter.pallet-register-history', compact('pallets', 'productTypes', 'productionLines', 'volumes'));
    }
<<<<<<< HEAD

    public function getPrintUrl()
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

    public function deletePallet($id)
    {
        $pallet = PalletRegister::find($id);
        $pallet->delete();
        $this->render();
    }
=======
>>>>>>> a82a91c (Your commit message)
}

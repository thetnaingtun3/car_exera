<?php

namespace App\Livewire\Pallet;

use App\Models\PalletRegister;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class BottlinglineCarton extends Component
{
    use WithPagination;

    public $start_pallet_number;
    public $end_pallet_number;

    public $productType = 'Chang beer';
    public $volumeSelection = '';
    public $availableProductionLines = [];
    public $availableVolumes = [];
    public $selectedPallets = [];  // Selected pallet IDs
    public $selectAll = false;     // Toggle for selecting all
    public $rangeStart;            // Start range for selection
    public $rangeEnd;              // End range for selection
    public $search = '';
    public $startDate = '';
    public $endDate = '';
    public $sortBy = 'id';
    public $sortDir = 'DESC';
    public $perPage = 100;
    public $dynamic = 1;

    public $productionLine = 'Bottling line Carton';
    public $package = 'Bottle';
    public $volume = '620 mL';
    public $unit = 'carton';
    public $totalAmountPerPallet = '75 cartons'; // Default to 75 for 'carton'

    public $data = [
        'carton' => ['package' => 'Bottle', 'volume' => '620 mL', 'total' => '75 cartons', 'productionLine' => 'Bottling line Carton'],
        'crate' => ['package' => 'Bottle', 'volume' => '620 mL', 'total' => '70 crates', 'productionLine' => 'Bottling line Crate'],
    ];

    protected $queryString = [
        'search',
        'startDate',
        'endDate',
        'selectedProductType',
        'selectedProductionLine',
        'selectedVolume',
        'sortBy',
        'sortDir',
        'perPage'
    ];

    private function updateUnitData()
    {
        if (isset($this->data[$this->unit])) {
            $this->package = $this->data[$this->unit]['package'];
            $this->volume = $this->data[$this->unit]['volume'];
            $this->productionLine = $this->data[$this->unit]['productionLine'];
            $this->totalAmountPerPallet = $this->data[$this->unit]['total']; // ✅ Corrected
        }
    }

    public function updatedUnit()
    {
        $this->updateUnitData();
    }


    public function selectAll()
    {
        $this->selectedPallets = PalletRegister::pluck('id')->toArray();
        $this->selectAll = true;
    }

    public function unselectAll()
    {
        $this->selectedPallets = [];
        $this->selectAll = false;
    }

    public function selectRangeByDynamic()
    {
        $this->selectedPallets = [];

        $pallets = $this->getPalletsQuery()->paginate($this->perPage);

        foreach ($pallets as $index => $pallet) {
            if (($index + 1) >= $this->rangeStart && ($index + 1) <= $this->rangeEnd) {
                $this->selectedPallets[] = $pallet->id;
            }
        }
    }


    public function getPalletsQuery()
    {
        return PalletRegister::whereIn('production_line', ['Bottling line Carton', 'Bottling line Crate'])
            ->orderBy($this->sortBy, $this->sortDir);
    }

    public function store()
    {
        $this->validate([
            'start_pallet_number' => 'required|integer|min:1',
            'end_pallet_number' => 'required|integer|min:' . $this->start_pallet_number,
        ]);

        $currentDate = Carbon::today()->toDateString();

        for ($i = $this->start_pallet_number; $i <= $this->end_pallet_number; $i++) {
            $exists = PalletRegister::where('pallet_number', $i)
                ->whereDate('created_at', $currentDate)
                ->where('production_line', $this->productionLine)
                ->where('product_type', $this->productType)
                ->where('volume', $this->volume)
                ->exists();

            if ($exists) {
                session()->flash('error', "Pallet number $i already exists today for production line '{$this->productionLine}', product type '{$this->productType}', and volume '{$this->volume}'.");
                return;
            }
        }

        $data = [];
        for ($i = $this->start_pallet_number; $i <= $this->end_pallet_number; $i++) {
            $data[] = [
                'pallet_number' => $i,
                'product_type' => $this->productType,
                'production_line' => $this->productionLine,
                'volume' => $this->volume,
                'package' => $this->package,
                'unit' => $this->unit,
                'total_amount_per_pallet' => $this->totalAmountPerPallet,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        PalletRegister::insert($data);

        $this->reset(['start_pallet_number', 'end_pallet_number']);

        Notification::make()
            ->title('Pallets registered successfully!')
            ->success()
            ->send();
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

    public function render()
    {
        $pallets = $this->getPalletsQuery()->paginate($this->perPage);
        return view('livewire.pallet.bottlingline-carton', compact('pallets'));
    }
}

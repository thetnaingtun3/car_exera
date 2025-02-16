<?php

namespace App\Livewire\Pallet;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PalletRegister;
use Filament\Notifications\Notification;
use Livewire\WithPagination;

class CanningLineOne extends Component
{
    use WithPagination;

    public $start_pallet_number;
    public $end_pallet_number;
    public $productType = '';
    public $productionLine = 'Canning line 1';
    public $volumeSelection = '';
    public $package = '';
    public $volume = '';
    public $unit = '';
    public $totalAmountPerPallet = '';

    public $availableProductionLines = [];
    public $availableVolumes = [];

    public $selectedPallets = [];
    public $selectAll = false;
    public $rangeStart;
    public $rangeEnd;

    public $search = '';
    public $startDate = '';
    public $endDate = '';
    public $selectedProductType = '';
    public $selectedProductionLine = '';
    public $selectedVolume = '';
    public $sortBy = 'id';
    public $sortDir = 'DESC';
    public $perPage = 100;
    public $dynamic = 1;

    public $data = [
        'Chang beer' => [

            '330 mL' => ['package' => 'Can', 'volume' => '330 mL', 'unit' => 'carton', 'total' => '100 cartons'],
            '500 mL' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],


        ],
        'Tapper beer' => [
            '330 mL' => ['package' => 'Can', 'volume' => '330 mL', 'unit' => 'carton', 'total' => '100 cartons'],
            '500 mL' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],
        ],
    ];


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

    protected $queryString = [
        'search', 'startDate', 'endDate', 'selectedProductType', 'selectedProductionLine', 'selectedVolume', 'sortBy', 'sortDir', 'perPage'
    ];

    public function updatedProductType($value)
    {
        if (isset($this->data[$value])) {
            $this->availableVolumes = array_keys($this->data[$value]);
            $this->reset(['volumeSelection', 'package', 'volume', 'unit', 'totalAmountPerPallet']);
        } else {
            $this->reset(['availableVolumes', 'volumeSelection', 'package', 'volume', 'unit', 'totalAmountPerPallet']);
        }
    }

    public function updatedVolumeSelection($value)
    {
        if (isset($this->data[$this->productType][$value])) {
            $details = $this->data[$this->productType][$value];
            $this->package = $details['package'];
            $this->volume = $details['volume'];
            $this->unit = $details['unit'];
            $this->totalAmountPerPallet = $details['total'];
        }
    }

    public function getPalletsQuery()
    {

        return PalletRegister::where('production_line', 'Canning line 1')->orderBy($this->sortBy, $this->sortDir);
    }

    public function store()
    {
        $this->validate([
            'start_pallet_number' => 'required|integer|min:1',
            'end_pallet_number' => 'required|integer|min:' . $this->start_pallet_number,
            'productType' => 'required',
            'productionLine' => 'required',
            'volume' => 'required',
        ]);

        $currentDate = Carbon::today()->toDateString();

        for ($i = $this->start_pallet_number; $i <= $this->end_pallet_number; $i++) {
            if (PalletRegister::where('pallet_number', $i)
                ->whereDate('created_at', $currentDate)
                ->where('production_line', $this->productionLine)
                ->where('product_type', $this->productType)
                ->where('volume', $this->volume)
                ->exists()) {

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

        $this->reset(['start_pallet_number', 'end_pallet_number', 'productType', 'productionLine', 'volumeSelection', 'package', 'volume', 'unit', 'totalAmountPerPallet']);

        Notification::make()
            ->title('Pallets registered successfully!')
            ->success()
            ->send();

        return to_route('pallet.canning-line-one');
    }

    public function render()
    {
        return view('livewire.pallet.canning-line-one', [
            'pallets' => $this->getPalletsQuery()->paginate($this->perPage)
        ]);
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

}

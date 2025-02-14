<?php

namespace App\Livewire\PalletResiter;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PalletRegister;
use Filament\Notifications\Notification;
use Livewire\WithPagination;

class PalletRegisterSubmit extends Component
{
    use WithPagination;

    public $start_pallet_number;
    public $end_pallet_number;
    public $productType = '';
    public $productionLine = '';
    public $volumeSelection = '';
    public $package = '';
    public $volume = '';
    public $unit = '';
    public $totalAmountPerPallet = '';
    public $availableProductionLines = [];
    public $availableVolumes = [];

    public $selectedPallets = [];  // Selected pallet IDs
    public $selectAll = false;     // Toggle for selecting all
    public $rangeStart;            // Start range for selection
    public $rangeEnd;              // End range for selection

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
<<<<<<< HEAD
            'Canning line 1' => [
                '330 mL' => ['package' => 'Can', 'volume' => '330 mL', 'unit' => 'carton', 'total' => '100 cartons'],
                '500 mL' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],
            ],
            'Canning line 2' => [
                '330 mL' => ['package' => 'Can', 'volume' => '330 mL', 'unit' => 'carton', 'total' => '100 cartons'],
                '500 mL' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],
            ],
=======
            'Canning line 1' => ['package' => 'Can', 'volume' => '330 mL', 'unit' => 'carton', 'total' => '100 cartons'],
            'Canning line 2' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],
>>>>>>> a82a91c (Your commit message)
            'Bottling line Carton' => ['package' => 'Bottle', 'volume' => '620 mL', 'unit' => 'carton', 'total' => '75 cartons'],
            'Bottling line Crate' => ['package' => 'Bottle', 'volume' => '620 mL', 'unit' => 'crate', 'total' => '70 crates'],
            'Keg line 1' => ['package' => 'Keg', 'volume' => '30 L', 'unit' => 'keg', 'total' => '8 kegs'],
            'Keg line 2' => ['package' => 'Keg', 'volume' => '30 L', 'unit' => 'keg', 'total' => '8 kegs'],
        ],
        'Tapper beer' => [
            'Canning line 1' => ['package' => 'Can', 'volume' => '330 mL', 'unit' => 'carton', 'total' => '100 cartons'],
<<<<<<< HEAD
            'Canning line 2' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],
=======
            'Canning line 2 ' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],

>>>>>>> a82a91c (Your commit message)
        ],
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

    public function updatedProductType($value)
    {
        if (isset($this->data[$value])) {
            $this->availableProductionLines = array_keys($this->data[$value]);
            $this->reset(['productionLine', 'volumeSelection', 'package', 'volume', 'unit', 'totalAmountPerPallet']);
        } else {
            $this->reset(['availableProductionLines', 'productionLine', 'volumeSelection', 'package', 'volume', 'unit', 'totalAmountPerPallet']);
        }
    }

    public function updatedProductionLine($value)
    {
        if (isset($this->data[$this->productType][$value])) {
            // Only Chang beer's Canning lines require volume selection
            if ($this->productType === 'Chang beer' && ($value === 'Canning line 1' || $value === 'Canning line 2')) {
                $this->availableVolumes = array_keys($this->data[$this->productType][$value]);
                $this->reset(['volumeSelection', 'package', 'volume', 'unit', 'totalAmountPerPallet']);
            } else {
                // Auto-fill for Tapper beer, Bottling lines, and Keg lines
                $this->availableVolumes = [];
                $details = $this->data[$this->productType][$value];
                $this->package = $details['package'];
                $this->volume = $details['volume'];
                $this->unit = $details['unit'];
                $this->totalAmountPerPallet = $details['total'];
            }
        } else {
            $this->reset(['availableVolumes', 'volumeSelection', 'package', 'volume', 'unit', 'totalAmountPerPallet']);
        }
    }

    public function updatedVolumeSelection($value)
    {
        if (isset($this->data[$this->productType][$this->productionLine][$value])) {
            $details = $this->data[$this->productType][$this->productionLine][$value];
            $this->package = $details['package'];
            $this->volume = $details['volume'];
            $this->unit = $details['unit'];
            $this->totalAmountPerPallet = $details['total'];
        }
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

    public function getPalletsQuery()
    {
        $query = PalletRegister::query();
        return $query->orderBy($this->sortBy, $this->sortDir);
    }


    public function store()
    {
<<<<<<< HEAD
        $this->validate([
            'start_pallet_number' => 'required|integer|min:1',
            'end_pallet_number' => 'required|integer|min:' . $this->start_pallet_number,
            'productType' => 'required',
            'productionLine' => 'required',
            'volume' => 'required',
        ]);

        $currentDate = Carbon::today()->toDateString();

        for ($i = $this->start_pallet_number; $i <= $this->end_pallet_number; $i++) {
            $exists = PalletRegister::where('pallet_number', $i)
                ->whereDate('created_at', $currentDate)
                ->where('production_line', $this->productionLine)
                ->where('volume', $this->volume)
                ->exists();

            if ($exists) {
                session()->flash('error', "Pallet number $i already exists for today with production line '{$this->productionLine}' and volume '{$this->volume}'.");
                return;
            }
        }

=======
        // Validate the inputs
        $validatedData = $this->validate(
            [

//                'pallet_number' must be unique in the pallet_registers table

                'productType' => 'required|string|max:255',
                'productionLine' => 'required|string|max:255',
                'package' => 'required|string|max:255',
                'volume' => 'required|min:1',
                'unit' => 'required|string|max:255',
                'totalAmountPerPallet' => 'required|min:1',
            ]
        );

        // Check for unique pallet numbers in the given range
        $existingPallets = PalletRegister::whereBetween('pallet_number', [$this->start_pallet_number, $this->end_pallet_number])->pluck('pallet_number')->toArray();

        if (!empty($existingPallets)) {
            session()->flash('error', 'The following pallet numbers already exist: ' . implode(', ', $existingPallets));
            return;
        }
        // Ensure that the start pallet number is less than or equal to the end pallet number
        if ($this->start_pallet_number > $this->end_pallet_number) {
            session()->flash('error', 'Start Pallet Number must be less than or equal to End Pallet Number.');
            return;
        }
        // Generate rows for the given pallet range
>>>>>>> a82a91c (Your commit message)
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

        return to_route('pallet.register');
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

    public function render()
    {
        $pallets = $this->getPalletsQuery()->paginate($this->perPage);
        return view('livewire.pallet-resiter.pallet-register-submit', compact('pallets'));
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


}

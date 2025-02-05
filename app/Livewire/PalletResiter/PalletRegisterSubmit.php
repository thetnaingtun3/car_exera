<?php

namespace App\Livewire\PalletResiter;

use Livewire\Component;
use App\Models\PalletRegister;
use Filament\Notifications\Notification;

class PalletRegisterSubmit extends Component
{
    public $start_pallet_number;
    public $end_pallet_number;

    public $productType = ''; // Selected product type
    public $productionLine = ''; // Selected production line
    public $package = ''; // Package
    public $volume = '';
    public $unit = '';
    public $totalAmountPerPallet = '';

    // Data with Product Type, Production Line, and related details
    public $data = [
        'Chang beer' => [
            'Canning line 1' => ['package' => 'Can', 'volume' => '330 mL', 'unit' => 'carton', 'total' => '100 cartons'],
            'Canning line 2' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],
            'Bottling line Carton' => ['package' => 'Bottle', 'volume' => '620 mL', 'unit' => 'carton', 'total' => '75 cartons'],
            'Bottling line Crate' => ['package' => 'Bottle', 'volume' => '620 mL', 'unit' => 'crate', 'total' => '70 crates'],
            'Keg line 1' => ['package' => 'Keg', 'volume' => '30 L', 'unit' => 'keg', 'total' => '8 kegs'],
            'Keg line 2' => ['package' => 'Keg', 'volume' => '30 L', 'unit' => 'keg', 'total' => '8 kegs'],
        ],
        'Tapper beer' => [
            'Canning line 1' => ['package' => 'Can', 'volume' => '330 mL', 'unit' => 'carton', 'total' => '100 cartons'],
            'Canning line 2 ' => ['package' => 'Can', 'volume' => '500 mL', 'unit' => 'carton', 'total' => '70 cartons'],

        ],
    ];

    public $availableProductionLines = []; // Dynamically updated production lines for the selected product type

    public function updatedProductType($value)
    {
        // Update available production lines based on the selected product type
        if (isset($this->data[$value])) {
            $this->availableProductionLines = array_keys($this->data[$value]);
            $this->reset(['productionLine', 'package', 'volume', 'unit', 'totalAmountPerPallet']);
        } else {
            $this->reset(['availableProductionLines', 'productionLine', 'package', 'volume', 'unit', 'totalAmountPerPallet']);
        }
    }

    public function updatedProductionLine($value)
    {
        // Update the details based on the selected production line
        if (isset($this->data[$this->productType][$value])) {
            $details = $this->data[$this->productType][$value];
            $this->package = $details['package'];
            $this->volume = $details['volume'];
            $this->unit = $details['unit'];
            $this->totalAmountPerPallet = $details['total'];
        } else {
            $this->reset(['package', 'volume', 'unit', 'totalAmountPerPallet']);
        }
    }

    public function store()
    {
        // Validate the inputs
        $validatedData = $this->validate(
            [
                'productType' => 'required|string|max:255',
                'productionLine' => 'required|string|max:255',
                'package' => 'required|string|max:255',
                'volume' => 'required|min:1',
                'unit' => 'required|string|max:255',
                'totalAmountPerPallet' => 'required|min:1',
            ]
        );

        // Ensure that the start pallet number is less than or equal to the end pallet number
        if ($this->start_pallet_number > $this->end_pallet_number) {
            session()->flash('error', 'Start Pallet Number must be less than or equal to End Pallet Number.');
            return;
        }

        // Generate rows for the given pallet range
        $data = [];
        for ($i = $this->start_pallet_number; $i <= $this->end_pallet_number; $i++) {
            $data[] = [
                'pallet_number' => 'PLT-' . $i,
                'product_type' => $this->productType,
                'production_line' => $this->productionLine,
                'package' => $this->package,
                'volume' => $this->volume,
                'unit' => $this->unit,
                'total_amount_per_pallet' => $this->totalAmountPerPallet,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Store the data in the database
        PalletRegister::insert($data);

        // Reset the input fields
        $this->reset(['start_pallet_number', 'end_pallet_number', 'productType', 'productionLine', 'package', 'volume', 'unit', 'totalAmountPerPallet']);

        Notification::make()
            ->title('Pallets registered successfully!')
            ->success()
            ->send();

        return to_route('pallet.register');
    }

    public function render()
    {
        $pallets = PalletRegister::orderBy('id', 'desc')->paginate(50);

        return view('livewire.pallet-resiter.pallet-register-submit', compact('pallets'));
    }
}

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
    public $volume = '';
    public $unit = '';
    public $totalAmountPerPallet = '';

    // Example data for product types and related production lines
    public $productData = [
        'Chang beer' => ['Canning line 1', 'Canning line 2', 'Bottling line', 'Keg line 1', 'Keg line 2'],
        'Tapper beer' => ['Canning line 1', 'Canning line 2'],
    ];

    // Example data for production lines
    public $productionLines = [
        'Canning line 1' => ['volume' => '330 ml', 'unit' => 'carton', 'total' => '100 cartons'],
        'Canning line 2' => ['volume' => '500 ml', 'unit' => 'carton', 'total' => '70 cartons'],
        'Bottling line' => ['volume' => '620 ml', 'unit' => 'carton', 'total' => '75 cartons'],
        'Keg line 1' => ['volume' => '620 ml', 'unit' => 'crate', 'total' => '70 crates'],
        'Keg line 2' => ['volume' => '30 L', 'unit' => 'keg', 'total' => '8 kegs'],
    ];

    public $availableProductionLines = []; // Dynamically available production lines for the selected product type

    public function updatedProductType($value)
    {
        if (isset($this->productData[$value])) {
            $this->availableProductionLines = $this->productData[$value];
            $this->reset(['productionLine', 'volume', 'unit', 'totalAmountPerPallet']);
        } else {
            $this->reset(['availableProductionLines', 'productionLine', 'volume', 'unit', 'totalAmountPerPallet']);
        }
    }

    public function updatedProductionLine($value)
    {
        if (isset($this->productionLines[$value])) {
            $this->volume = $this->productionLines[$value]['volume'];
            $this->unit = $this->productionLines[$value]['unit'];
            $this->totalAmountPerPallet = $this->productionLines[$value]['total'];
        } else {
            $this->reset(['volume', 'unit', 'totalAmountPerPallet']);
        }
    }
    public function store()
    {
        // Validate that start_pallet_number is less than end_pallet_number
        if ($this->start_pallet_number > $this->end_pallet_number) {
            session()->flash('error', 'Start Pallet Number must be less than or equal to End Pallet Number.');
            return;
        }

        // Generate rows for the given range
        $data = [];
        for ($i = $this->start_pallet_number; $i <= $this->end_pallet_number; $i++) {
            $data[] = [
                'pallet_number' => 'PLT-' . $i,
                'product_type' => $this->productType,
                'production_line' => $this->productionLine,
                'volume' => $this->volume,
                'unit' => $this->unit,
                'total_amount_per_pallet' => $this->totalAmountPerPallet,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        PalletRegister::insert($data);

        // Reset input fields
        $this->reset(['start_pallet_number', 'end_pallet_number', 'productType', 'productionLine', 'volume', 'unit', 'totalAmountPerPallet']);
        Notification::make()
            ->title('Pallets registered successfully!')
            ->success()
            ->send();
        return to_route('pallet.register');
    }
    public function render()
    {
        return view('livewire.pallet-resiter.pallet-register-submit');
    }
}

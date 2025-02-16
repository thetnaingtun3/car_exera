<?php


namespace App\Livewire\Pallet;

use App\Models\PalletRegister;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class KegLineTwo extends Component
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

    public $productionLine = 'Keg line 2';
    public $package = 'Keg';
    public $volume = '30 mL';
    public $unit = 'keg';
    public $totalAmountPerPallet = '8 kegs';

    public $data = [

        'Keg line 2' => ['package' => 'Keg', 'volume' => '30 L', 'unit' => 'keg', 'total' => '8 kegs'],
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

        $query = PalletRegister::query()->where('production_line', 'Keg line 2');
        return $query->orderBy($this->sortBy, $this->sortDir);
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

        $this->reset(['start_pallet_number', 'end_pallet_number', 'productType', 'productionLine', 'volumeSelection', 'package', 'volume', 'unit', 'totalAmountPerPallet']);

        Notification::make()
            ->title('Pallets registered successfully!')
            ->success()
            ->send();

        return to_route('pallet.kegline.two');
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

        return view('livewire.pallet.keg-line-two', compact('pallets'));
//        return view('livewire.pallet.bottlingline-carton', compact('pallets'));
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

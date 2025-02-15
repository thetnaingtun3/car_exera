<?php

namespace App\Livewire\CarRegister;

use Livewire\Component;
use App\Models\LSP;
use App\Models\Truck;
use App\Models\Customer;
use App\Models\CarRegistration;
use App\Models\CarRegisterProduct;
use Filament\Notifications\Notification;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class SubmitCarRegister extends Component
{
    public $lsp_id;
    public $customer_id;
    public $car_id;
    public $driver_id;
    public $driver_name;
    public $order_number;
    public $temporaryOrderNumber = '';
    public $orderNumbers = [];

    public $remark;

    public $product = '';
    public $package = '';
    public $qty = '';
    public $unit = '';
    public $tunit;

    public $products = [];
    public $isOtherDriver = false;
    public $other_truck_licence_plate = '';
    public $other_truck_size = '';

    public $selectedCars = [];
    public $selectAll = false;
    public $dynamic = 1; // Added new dynamic feature
    public $sortBy = 'id';
    public $sortDir = 'DESC';
    public $perPage = 100;
    public $rangeStart;
    public $rangeEnd;

    #[Computed]
    public function lsps()
    {
        return LSP::where('status', 'active')->get();
    }

    #[Computed]
    public function customers()
    {
        return $this->lsp_id ? Customer::where('lsp_id', $this->lsp_id)->where('status', 'active')->get() : collect();
    }

    #[Computed]
    public function trucks()
    {
        return $this->lsp_id ? Truck::where('lsp_id', $this->lsp_id)->where('status', 'active')->get() : collect();
    }

    #[Computed]
    public function truckDrivers()
    {
        if ($this->car_id) {
            return Truck::where('id', $this->car_id)->where('status', 'active')->where('driver_name', '!=', 'null')->get(['id', 'driver_name']);
        }
        return collect();
    }

    #[Computed]
    public function getAvailablePackagesProperty()
    {
        if ($this->product === 'Chang') {
            return config('custom.package');
        } elseif ($this->product === 'Tapper') {
            return config('custom.package2');
        }
        return [];
    }

    private function getPackageLabel($product, $packageKey)
    {
        if ($product === 'Chang') {
            $packages = config('custom.package');
        } elseif ($product === 'Tapper') {
            $packages = config('custom.package2');
        } else {
            return $packageKey;
        }

        return $packages[$packageKey] ?? $packageKey;
    }

    public function updatedProduct()
    {
        $this->package = '';
    }

    public function add()
    {
        $this->validate([
            'product' => 'required|string',
            'package' => 'required|string',
            'qty' => 'required|integer',
            'unit' => 'required|string',
        ]);

        $packageName = $this->getPackageLabel($this->product, $this->package);

        $this->products[] = [
            'product' => $this->product,
            'package' => $packageName,
            'qty' => $this->qty,
            'unit' => $this->unit,
        ];

        $this->reset(['product', 'package', 'qty', 'unit']);
    }

    public function updatedCarId()
    {
        if ($this->car_id === 'other') {
            $this->other_truck_licence_plate = '';
            $this->other_truck_size = '';
        }
    }

    public function updatedDriverId()
    {
        if ($this->driver_id === 'other') {
            $this->isOtherDriver = true;
            $this->driver_name = '';
        } else {
            $this->isOtherDriver = false;
            $this->driver_name = Truck::where('id', $this->driver_id)->where('status', 'active')->value('driver_name');
        }
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products);
    }

    public function addOrderNumber()
    {
        $this->validate([
            'temporaryOrderNumber' => 'required|digits:10',
        ]);

        if (count($this->orderNumbers) >= 10) {
            $this->addError('orderNumbers', 'You can only add a maximum of 10 order numbers.');
            return;
        }

        if (in_array($this->temporaryOrderNumber, $this->orderNumbers)) {
            $this->addError('temporaryOrderNumber', 'This order number has already been added.');
            return;
        }

        $this->orderNumbers[] = $this->temporaryOrderNumber;
        $this->temporaryOrderNumber = '';
    }

    public function removeOrderNumber($index)
    {
        unset($this->orderNumbers[$index]);
        $this->orderNumbers = array_values($this->orderNumbers);
    }

    public function save()
    {
        if (empty($this->products)) {
            Notification::make()->title('No products added!')->danger()->send();
            return;
        }

        if (empty($this->orderNumbers)) {
            $this->addError('orderNumbers', 'Please add at least one valid order number.');
            return;
        }

        $concatenatedOrderNumbers = implode(',', $this->orderNumbers);
        $driverIdToStore = $this->isOtherDriver ? null : $this->driver_id;
        $driverNameToStore = $this->isOtherDriver ? $this->driver_name : Truck::where('id', $this->driver_id)->where('status', 'active')->value('driver_name');

        DB::transaction(function () use ($concatenatedOrderNumbers, $driverIdToStore, $driverNameToStore) {


            if ($this->car_id === 'other') {
                $this->validate([
                    'lsp_id' => 'required|integer',
                    'other_truck_licence_plate' => 'required|regex:/^\d[A-Z]-\d{4}$/|unique:trucks,licence_plate',
                ]);

                $truck = Truck::create([
                    'lsp_id' => $this->lsp_id,
                    'licence_plate' => $this->other_truck_licence_plate,
                    'size' => $this->other_truck_size . ' ' . $this->tunit,
                    'driver_name' => $this->driver_name,
                    'status' => 'active',
                ]);
            }
            $carRegistration = CarRegistration::create([
                'lsp_id' => $this->lsp_id,
                'customer_id' => $this->customer_id,
                'car_id' => $this->car_id === 'other' ? null : $this->car_id,
                'driver_id' => $driverIdToStore,
                'driver_name' => $driverNameToStore,
                'order_number' => $concatenatedOrderNumbers,
                'remark' => $this->remark,
                'licence_plate' => $this->car_id === 'other' ? $this->other_truck_licence_plate : null,
                'size' => $this->car_id === 'other' ? $this->other_truck_size . ' ' . $this->tunit : null,
                'dynamic' => $this->dynamic, // Added dynamic property to database
            ]);

            foreach ($this->products as $product) {
                CarRegisterProduct::create([
                    'car_registration_id' => $carRegistration->id,
                    'product' => $product['product'],
                    'package' => $product['package'],
                    'qty' => $product['qty'],
                    'unit' => $product['unit'],
                ]);
            }
        });

        $this->reset(['lsp_id', 'customer_id', 'car_id', 'driver_id', 'driver_name', 'orderNumbers', 'remark', 'products', 'dynamic']);

        Notification::make()->title('Car Registration Submitted Successfully!')->success()->send();

        return to_route('reg.car');
    }

    public function selectRangeByDynamic()
    {
        $this->selectedCars = [];

        $cars = $this->getCarsQuery()->paginate($this->perPage);

        foreach ($cars as $index => $car) {
            if ($index + 1 >= $this->rangeStart && ($index + 1) <= $this->rangeEnd) {
                $this->selectedCars[] = $car->id;
            }
        }
    }

    public function allCheck()
    {
        $this->selectedCars = CarRegistration::pluck('id')->toArray();
        $this->selectAll = true;
    }

    public function removeCheck()
    {
        $this->selectedCars = [];
        $this->selectAll = false;
    }

    public function getCarsQuery()
    {
        $query = CarRegistration::with(['lsp', 'customer', 'truck']);


        return $query->orderBy($this->sortBy, $this->sortDir);
    }


    public function render()
    {
        //        $registrations = CarRegistration::with('products')->orderBy('id', 'desc')->get();

        $registrations = $this->getCarsQuery()->paginate($this->perPage);
        return view('livewire.car-register.submit-car-register', compact('registrations'));
    }

    public function getPrintUrl()
    {
        if (empty($this->selectedCars)) {
            Notification::make()
                ->title('No  selected for printing.')
                ->danger()
                ->send();
            return;
        }
        $carIds = implode(',', $this->selectedCars);

        return redirect()->route('car.print.qr', ['ids' => $carIds]);
    }

    public function deleteAllCarReg($id)
    {
        $cc = CarRegistration::findOrFail($id);
        $cc->delete();
        $this->render();
    }
}

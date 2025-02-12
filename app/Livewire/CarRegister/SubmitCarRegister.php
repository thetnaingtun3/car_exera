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
    public $orderNumbers = [];  // Store multiple order numbers before saving

    public $remark;

    public $product = '';
    public $package = '';
    public $qty = '';
    public $unit = '';
    public $tunit;

    public $products = []; // To hold dynamically added products
    public $isOtherDriver = false; // Tracks if "Other" option is selected
    public $other_truck_licence_plate = '';
    public $other_truck_size = '';

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
        // Dynamically return the correct package list based on the selected product
        if ($this->product === 'Chang') {
            return config('custom.package');  // Show package1 for Chang
        } elseif ($this->product === 'Tapper') {
            return config('custom.package2');  // Show package2 for Tapper
        }
        return [];  // Return empty array if no product is selected
    }
    #[Computed]
    private function getPackageLabel($product, $packageKey)
    {
        if ($product === 'Chang') {
            $packages = config('custom.package');
        } elseif ($product === 'Tapper') {
            $packages = config('custom.package2');
        } else {
            return $packageKey;  // Fallback in case no product is selected
        }

        return $packages[$packageKey] ?? $packageKey;  // Return the label or key if not found
    }

    public function updatedProduct($value)
    {
        // Reset the package selection when product changes
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
            'package' => $packageName,  // Store the label, not the key
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
        // Validate that the temporary order number is exactly 10 digits
        $this->validate([
            'temporaryOrderNumber' => 'required|digits:10',
        ]);

        // Check if we already have 10 order numbers added
        if (count($this->orderNumbers) >= 10) {
            $this->addError('orderNumbers', 'You can only add a maximum of 10 order numbers.');
            return;
        }

        // Check for duplicate order numbers
        if (in_array($this->temporaryOrderNumber, $this->orderNumbers)) {
            $this->addError('temporaryOrderNumber', 'This order number has already been added.');
            return;
        }

        // Add the valid order number to the list
        $this->orderNumbers[] = $this->temporaryOrderNumber;

        // Reset the input field for the next entry
        $this->temporaryOrderNumber = '';
    }
    public function removeOrderNumber($index)
    {
        // Remove the selected order number from the list
        unset($this->orderNumbers[$index]);
        $this->orderNumbers = array_values($this->orderNumbers);  // Re-index the array
    }

    public function save()
    {
        // Check if $this->products is empty
        if (empty($this->products)) {
            Notification::make()
                ->title('No products added!')
                ->danger()  // Change to 'danger' for a red alert
                ->send();

            return;  // Stop execution if no products are added
        }

        if (empty($this->orderNumbers)) {
            $this->addError('orderNumbers', 'Please add at least one valid order number.');
            return;
        }



        // Concatenate order numbers into a single string
        $concatenatedOrderNumbers = implode(',', $this->orderNumbers);

        $driverIdToStore = $this->isOtherDriver ? null : $this->driver_id;
        $driverNameToStore = $this->isOtherDriver ? $this->driver_name : Truck::where('id', $this->driver_id)->where('status', 'active')->value('driver_name');
        DB::transaction(function () use ($concatenatedOrderNumbers, $driverIdToStore, $driverNameToStore) {

            $carRegistration = CarRegistration::create([
                'lsp_id' => $this->lsp_id,
                'customer_id' => $this->customer_id,
                // 'car_id' => $this->car_id,
                'car_id' => $this->car_id === 'other' ? null : $this->car_id,
                'driver_id' => $driverIdToStore,
                'driver_name' => $driverNameToStore,
                'order_number' => $concatenatedOrderNumbers,  // Store concatenated order numbers
                'remark' => $this->remark,
                'licence_plate' => $this->car_id === 'other' ? $this->other_truck_licence_plate : null,
                'size' => $this->car_id === 'other' ? $this->other_truck_size  . ' ' . $this->tunit : null,
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
        // Reset form inputs
        $this->reset(['lsp_id', 'customer_id', 'car_id', 'driver_id', 'driver_name', 'orderNumbers', 'remark', 'products']);

        Notification::make()
            ->title('Car Registration Submitted Successfully!')
            ->success()
            ->send();

        return to_route('reg.car');
    }


    public function render()
    {
        $registrations = CarRegistration::with('products')->orderBy('id', 'desc')->get();

        return view('livewire.car-register.submit-car-register', compact('registrations'));
    }
}

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

class SubmitCarRegister extends Component
{
    public $lsp_id;
    public $customer_id;
    public $car_id;
    public $driver_id;
    public $driver_name;
    public $order_number;
    public $remark;

    public $product = '';
    public $package = '';
    public $qty = '';
    public $unit = '';

    public $products = []; // To hold dynamically added products
    public $isOtherDriver = false; // Tracks if "Other" option is selected

    // updatedDriverId
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
            // Fetch the selected truck and return its driver details
            return Truck::where('id', $this->car_id)->where('status', 'active')->get(['id', 'driver_name']);
        }

        return collect(); // Return an empty collection if no truck is selected
    }

    public function add()
    {
        // Validate the current product entry
        $this->validate([
            'product' => 'required|string',
            'package' => 'required|string',
            'qty' => 'required|integer',
            'unit' => 'required|string',
        ]);

        // Add the product to the array
        $this->products[] = [
            'product' => $this->product,
            'package' => $this->package,
            'qty' => $this->qty,
            'unit' => $this->unit,
        ];

        // Reset the inputs for the next product entry
        $this->reset(['product', 'package', 'qty', 'unit']);
    }

    public function updatedDriverId()
    {
        if ($this->driver_id === 'other') {
            $this->isOtherDriver = true; // Show input field when "Other" is selected
            $this->driver_name = ''; // Reset driver name input
        } else {
            $this->isOtherDriver = false; // Hide input field when a driver is selected
            $this->driver_name = Truck::where('id', $this->driver_id)->where('status', 'active')->value('driver_name'); // Auto-fill driver name
        }
    }


    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products); // Re-index the array
    }

    public function save()
    {
        $driverIdToStore = $this->isOtherDriver ? null : $this->driver_id;
        $driverNameToStore = $this->isOtherDriver ? $this->driver_name : Truck::where('id', $this->driver_id)->where('status', 'active')->value('driver_name');

        // Create Car Registration without validation
        $carRegistration = CarRegistration::create([
            'lsp_id' => $this->lsp_id,
            'customer_id' => $this->customer_id,
            'car_id' => $this->car_id,
            'driver_id' => $driverIdToStore,  // Store NULL if "Other" is selected
            'driver_name' => $driverNameToStore,  // Store entered name if "Other" is selected
            'order_number' => $this->order_number,
            'remark' => $this->remark,
        ]);

        // Save Products
        foreach ($this->products as $product) {
            CarRegisterProduct::create([
                'car_registration_id' => $carRegistration->id,
                'product' => $product['product'],
                'package' => $product['package'],
                'qty' => $product['qty'],
                'unit' => $product['unit'],
            ]);
        }

        // Reset the form
        $this->reset(['lsp_id', 'customer_id', 'car_id', 'driver_id', 'driver_name', 'order_number', 'remark', 'products']);

        // Notify success
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

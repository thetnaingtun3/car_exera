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
    public $driver_name;
    public $order_number;
    public $remark;

    public $product = '';
    public $package = '';
    public $qty = '';
    public $unit = '';

    public $products = []; // To hold dynamically added products

    #[Computed]
    public function lsps()
    {
        return LSP::all();
    }

    #[Computed]
    public function customers()
    {
        return $this->lsp_id ? Customer::where('lsp_id', $this->lsp_id)->get() : collect();
    }

    #[Computed]
    public function trucks()
    {
        return $this->lsp_id ? Truck::where('lsp_id', $this->lsp_id)->get() : collect();
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
    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products); // Re-index the array
    }
    public function save()
    {
        // Validate Car Registration data
        $validatedData = $this->validate([
            'lsp_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'car_id' => 'required|integer',
            'driver_name' => 'required|string|max:255',
            'order_number' => 'required|string|max:50',
            'remark' => 'nullable|string',
        ]);

        // Create Car Registration
        $carRegistration = CarRegistration::create($validatedData);

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
        $this->reset(['lsp_id', 'customer_id', 'car_id', 'driver_name', 'order_number', 'remark', 'products']);

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

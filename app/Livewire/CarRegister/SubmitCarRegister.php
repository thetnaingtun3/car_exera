<?php

namespace App\Livewire\CarRegister;

use App\Models\LSP;
use App\Models\Truck;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use App\Models\CarRegistration;
use Filament\Notifications\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Attributes\Computed;

class SubmitCarRegister extends Component
{
    public $lsp_id;
    public $customer_id;
    public $car_id;
    public $driver_name;
    public $product;
    public $package;
    public $unit;
    public $order_number;
    public $remark;

    public function updatedLspId()
    {
        // Reset dependent dropdowns when LSP changes
        $this->customer_id = null;
        $this->car_id = null;
    }

    #[Computed]
    public function lsps()
    {
        return LSP::all(); // Return all LSPs
    }

    #[Computed]
    public function customers()
    {
        return $this->lsp_id ? Customer::where('lsp_id', $this->lsp_id)->get() : collect(); // Filter customers by LSP
    }

    #[Computed]
    public function trucks()
    {
        return $this->lsp_id ? Truck::where('lsp_id', $this->lsp_id)->get() : collect(); // Filter trucks by LSP
    }


    #[Url(history: true)]
    public $search = '';


    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Url()]
    public $perPage = 20;



    public $qr_code;
    public $click_date;
    public $status = '0'; // Default value

    public function save()
    {
        $validatedData = $this->validate([
            'lsp_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'car_id' => 'required|integer',
            'driver_name' => 'required|string|max:255',
            'product' => 'required|string',
            'package' => 'required|string',
            'unit' => 'required|string',
            'order_number' => 'required|string|max:50',
            'remark' => 'nullable|string',
        ]);

        // Save the data (adjust to match your database structure)
        CarRegistration::create($validatedData);

        // Reset the form
        $this->reset();

        // Flash a success message
        Notification::make()
            ->title('Car Register  Successfully')
            ->success()
            ->send();
        return to_route('reg.car');
    }

    public function other()
    {

        dd("I am o");
    }


    #[Title('Car Register')]
    public function render()
    {
        $registrations = CarRegistration::with(['lsp', 'customer', 'truck'])
            ->orderBy('id', 'desc') // Replace 'column_name' with the actual column name you want to sort by
            ->get();
        return view('livewire.car-register.submit-car-register', compact('registrations'));
    }
}

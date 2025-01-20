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

class SubmitCarRegister extends Component
{

    // public $lsps;
    public $lsps = [];
    public $customers = [];
    public $trucks = [];
    public $lsp_id;
    public $customer_id;
    public $car_id;
    public $car_number;
    public $customer_name;
    public $driver_name;
    public $type_of_truck;
    public $type_of_truck_type;
    public $product;
    public $package;
    public $qty;
    public $unit;
    public $order_number;
    public $remark;


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

    public function mount()
    {
        $this->lsps = LSP::all();
        $this->customers = Customer::all();
        $this->trucks = Truck::all();
    }

    public function save()
    {
        $validatedData = $this->validate([
            'lsp_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'car_id' => 'required|integer',
            'driver_name' => 'required|string|max:255',
            'product' => 'required|string',
            'package' => 'required|string',
            'qty' => 'required|numeric',
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



    public function generateQrCode($id)
    {
        // Fetch the record by ID

        $record = CarRegistration::where('id', $id)->with(['lsp', 'customer', 'truck'])->first();
        // Data for QR Code
        $qrData = sprintf(
            "Car Number: %s\nDriver Name: %s\nType of Truck: %s\nCustomer Name: %s\nDate and Time: %s",
            $record->car_number,
            $record->driver_name,
            $record->type_of_truck,
            $record->customer_name,
            now()->format('d-m-Y H:i:s')
        );

        // Generate the QR Code and return it to a new tab
        return response(
            QrCode::format('svg')->size(200)->generate($qrData),
            200,
            ['Content-Type' => 'image/svg+xml']
        );
    }

    #[Title('Car Register')]
    public function render()
    {
        $registrations = CarRegistration::with(['lsp', 'customer', 'truck'])->get();
        return view('livewire.car-register.submit-car-register', compact('registrations'));
    }
}

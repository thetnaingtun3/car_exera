<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CarRegistration;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodePage extends Component
{
    public $qrCode;
    public $record;

    public function mount($id)
    {
        $record = CarRegistration::with(['lsp', 'customer', 'truck'])->find($id);

        if (!$record) {
            abort(404, 'Record not found');
        }

        $this->record = [
            'car_number' => $record->truck?->licence_plate ?? 'No Truck Assigned',
            'driver_name' => $record->driver_name,
            'type_of_truck' => $record->truck?->size ?? 'Unknown Size',
            'customer_name' => $record->customer?->customer_name ?? 'No Customer Assigned',
            'date_time' => now()->format('d-m-Y H:i:s'),
        ];


        // $qrData = sprintf(
        //     "Car Number: %s\nDriver Name: %s\nType of Truck: %s\nCustomer Name: %s\nDate and Time: %s",
        //     $record->truck?->licence_plate ?? 'No Truck Assigned',
        //     $record->id,
        //     $record->truck?->size ?? 'Unknown Size',
        //     $record->customer?->customer_name ?? 'No Customer Assigned',
        //     now()->format('d-m-Y H:i:s')
        // );


        // }
        // Generate QR Code
        // $this->qrCode = QrCode::size(200)->generate($qrData);
    }
    public function render()
    {
        return view('livewire.qr-code-page');
    }
}

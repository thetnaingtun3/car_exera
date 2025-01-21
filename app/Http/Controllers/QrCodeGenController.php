<?php

namespace App\Http\Controllers;

use App\Models\CarRegistration;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeGenController extends Controller
{
    public function qrcodegen($id)
    {


        $record = CarRegistration::with(['lsp', 'customer', 'truck'])->find($id);

        // Handle missing record
        if (!$record) {
            abort(404, 'Record not found.');
        }

        // Format the data for the QR code
        $qrData = sprintf(
            "Car Number: %s\nDriver Name: %s\nType of Truck: %s\nCustomer Name: %s\nDate and Time: %s",
            $record->truck?->licence_plate ?? 'No Truck Assigned',
            $record->id,
            $record->truck?->size ?? 'Unknown Size',
            $record->customer?->customer_name ?? 'No Customer Assigned',
            now()->format('d-m-Y H:i:s')
        );

        // Generate the QR Code
        $qrCode = QrCode::size(200)->generate($qrData);

        return view('qr-code-page', [
            'qrCode' => $qrCode,
            'record' => $record,
        ]);
    }
}

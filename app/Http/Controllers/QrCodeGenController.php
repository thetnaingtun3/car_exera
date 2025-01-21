<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CarRegistration;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeGenController extends Controller
{
    public function qrcodegen($id)
    {




        $findData = CarRegistration::with(['lsp', 'customer', 'truck'])->find($id);
        if ($findData->status == '0') {

            $findData->update(['status' => '1', 'click_date' => now()]);
        }


        $record = CarRegistration::with(['lsp', 'customer', 'truck'])->find($findData->id);

        // Handle missing record
        if (!$record) {
            abort(404, 'Record not found.');
        }

        // Format the data for the QR code
        $qrData = sprintf(
            "LSPName/  %s\nCar Number/  %s\nDriver Name/  %s\nType of Truck/  %s\nCustomer Name/  %s\nDate and Time/  %s",
            $record->lsp?->lsp_name ?? 'No LSP Assigned',
            $record->truck?->licence_plate ?? 'No Truck Assigned',
            $record->driver_name,
            $record->truck?->size ?? 'Unknown Size',
            $record->customer?->customer_name ?? 'No Customer Assigned',

            // $record->click_date,
            // date('d-m-Y H:i:s', strtotime($record->click_date)),
            Carbon::parse($record->click_date)->format('d-m-Y H:i:s'),
        );

        // Generate the QR Code
        $qrCode = QrCode::size(200)->generate($qrData);

        return view('qr-code-page', [
            'qrCode' => $qrCode,
            'record' => $record,
        ]);
    }
}

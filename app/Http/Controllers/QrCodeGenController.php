<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CarRegistration;
use App\Models\PalletRegister;
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
            "LSPName:  %s\nCar Number:  %s\nDriver Name:  %s\nType of Truck:  %s\nCustomer Name:  %s\nDate and Time:  %s",
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
    public function palletQrCode($id)
    {
        // Find the PalletRegister record by ID
        $record = PalletRegister::find($id);
        if ($record->status == '0') {

            $record->update(['status' => '1', 'click_date' => now()]);
        }


        // Handle missing record
        if (!$record) {
            abort(404, 'Pallet not found.');
        }

        // Format the data for the QR code
        $qrData = sprintf(
            "Pallet Number: %s\nProduct Type: %s\nProduction Line: %s\nPackage: %s\nVolume: %s\nUnit: %s\nTotal: %s\nDate: %s",
            $record->pallet_number,
            $record->product_type,
            $record->production_line,
            $record->package,
            $record->volume,
            $record->unit,
            $record->total_amount_per_pallet,

            Carbon::parse($record->click_date)->format('d-m-Y H:i:s'),
        );

        // Generate the QR Code
        $qrCode = QrCode::size(200)->generate($qrData);

        // Return the QR code view
        return view('pallet-qr-code-pag', [
            'qrCode' => $qrCode,
            'record' => $record,
        ]);
    }
    public function printQRCodes(Request $request)
    {
        $palletIds = explode(',', $request->query('ids'));
        $selectedPallets = PalletRegister::whereIn('id', $palletIds)->get();

        return view('livewire.pallet-resiter.print-qr-codes', compact('selectedPallets'));
    }
}
